@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3">
        @include('layouts.sidebar')
    </div>

    <div class="col-6">
          {{-- Bagian Story --}}
        <div class="d-flex overflow-auto py-3 border-bottom mb-4" style="gap: 10px;">
            @for ($i = 1; $i <= 8; $i++)
                <div class="text-center">
                    <img src="" class="rounded-circle mb-1" width="60px" height="60px" alt="story">
                    <div style="font-size: 12px;">User{{ $i }}</div>
                </div>
            @endfor
        </div>
<div class="modal fade" id="createPostModal" tabindex="-1">
    <div class="modal-dialog">
      <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="title" class="form-control mb-2" placeholder="Judul Foto" required>
          <textarea name="description" class="form-control mb-2" placeholder="Deskripsi Foto" rows="3" required></textarea>
          <input type="file" name="image" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Post</button>
        </div>
      </form>
    </div>
  </div>

<div id="postList">
    @foreach ($posts as $post)
        @include('components.post', ['post' => $post])
    @endforeach
</div>


    </div>

    <div class="col-3">
        @include('layouts.add')
    </div>
</div>
@endsection
