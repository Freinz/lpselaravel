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
@endsection