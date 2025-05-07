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
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keadaan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->nama_barang }}</td>
                    <td>{{ $post->jumlah }}</td>
                    <td>{{ $post->keadaan }}</td>
                    <td class="d-flex">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin hapus postingan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm me-1">Hapus</button>
                        </form>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $post->id }}">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
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
                <input type="text" name="nama_barang" class="form-control mb-2" placeholder="Nama Barang" required>
                <input type="text" name="jumlah" class="form-control mb-2" placeholder="Jumlah Barang" required>
                <select name="keadaan" class="form-select" aria-label="Default select example">
                    <option selected>Keadaan</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                  </select>

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
            </div>
        </div>



</div>
@endsection
