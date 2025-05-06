@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @include('layouts.sidebar')
    </div>

    <div class="col-10">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>John</td>
                <td>Doe</td>
                <td>@social</td>
              </tr>
            </tbody>
          </table>
    </div>
        <div class="modal fade" id="createPostModal" tabindex="-1">
            <div class="modal-dialog">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <input type="text" name="title" class="form-control mb-2" placeholder="Nama Barang" required>
                <input type="text" name="title" class="form-control mb-2" placeholder="Nama Barang" required>
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
@endsection
