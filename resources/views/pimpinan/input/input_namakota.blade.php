@extends('pimpinan.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Forms')
@section('breadcrumb-item-active', 'Tambahkan Kota')

@section('css')
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambahkan Kota</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('store_kota') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="nama_kota">Nama Kota</label>
                                <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" name="nama_kota" id="nama_kota" placeholder="Masukkan Nama Kota" value="{{ old('nama_kota') }}">
                                @error('nama_kota')
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
                            <th>Nama Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kota as $kota)
                        <tr>
                            <td>{{$kota->nama_kota}}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{url('kota_read', $kota->id)}}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <button class="btn btn-danger delete-button" data-id="{{ $kota->id }}">
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
            var urlToRedirect = "/kota_delete/" + id;
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