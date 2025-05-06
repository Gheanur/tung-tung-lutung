<div>
    <div class="card mb-4 position-relative">
        {{-- Isi Post --}}
        
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
