@extends('pimpinan.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Forms')
@section('breadcrumb-item-active', 'Tambahkan Subkategori')

@section('css')
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambahkan Subkategori</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('store_subkategori') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="nama_subkategori">Nama Subkategori</label>
                                <input type="text" class="form-control @error('nama_subkategori') is-invalid @enderror" name="nama_subkategori" id="nama_subkategori" placeholder="Masukkan Nama Subkategori" value="{{ old('nama_subkategori') }}">
                                @error('nama_subkategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="kategori_id">Kategori</label>
                                <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                    @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text-right" style="bottom: 50px; right: 20px;">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->


<div class="col-sm-12">
    <div class="card border-0 table-card user-profile-list">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover " id="pc-dt-simple">
                    <thead>
                        <tr>
                            <th>Nama Sub Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subKategori as $subKategori)
                        <tr>
                            <td>{{$subKategori->nama_subkategori}}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{url('subKategori_read', $subKategori->id)}}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <button class="btn btn-danger delete-button" data-id="{{ $subKategori->id }}">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').on('click', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var urlToRedirect = "/subKategori_delete/" + id;
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Iya, Hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        });
    });
</script>
@endsection
