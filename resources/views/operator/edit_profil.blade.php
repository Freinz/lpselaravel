@extends('operator.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Edit Profil')

@section('css')
    <!-- [Page specific CSS] start -->
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/datepicker-bs5.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
    <!-- [Page specific CSS] end -->
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>User Control</h5>
            </div>
            <div class="card-body">
                <form action="{{ url('kirim_edit_profil') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nama_user">Nama</label>
                                <input type="text" class="form-control @error('nama_user') is-invalid @enderror" name="nama_user" id="nama_user" placeholder="Enter Nama" value="">
                                @error('nama_user')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="no_hp">No Handphone</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="No Handphone" value="" required>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" placeholder="NIP" value="">
                                @error('nip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="no_ktp">No KTP</label>
                                <input type="number" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" id="no_ktp" placeholder="No KTP" value="">
                                @error('no_ktp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection
