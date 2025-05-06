<div>
    <div class="card mb-4 position-relative">

        {{-- Tombol 3 titik (dropdown menu) --}}
        <div class="dropdown position-absolute top-0 end-0 m-2">
            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots"></i> {{-- Bootstrap Icons, pastikan sudah include --}}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $post->id }}">
                        Edit
                    </button>
                </li>
                <li>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin hapus postingan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                    </form>
                </li>
            </ul>
        </div>

        {{-- Isi Post --}}
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 300px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>
            <small class="text-muted">Posted {{ $post->created_at->diffForHumans() }}</small>
            <form action="{{ route('posts.like', $post->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-link p-0">{{ $post->likes->count() }} ❤️ Like</button>
            </form>
        </div>

    </div>
    <!-- Modal Edit Post -->
<div class="modal fade" id="editPostModal{{ $post->id }}" tabindex="-1">
    <div class="modal-dialog">
      <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="title" class="form-control mb-2" value="{{ $post->title }}" required>
          <textarea name="description" class="form-control mb-2" rows="3" required>{{ $post->description }}</textarea>
          <input type="file" name="image" class="form-control mb-2">
          <small class="text-muted">Kosongkan gambar jika tidak ingin ganti.</small>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
      </form>
    </div>
  </div>



</div>
