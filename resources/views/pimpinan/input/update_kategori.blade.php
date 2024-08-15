@extends('pimpinan.main')

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')
@section('breadcrumb-item-active', 'Nama Sub Kategori')

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('kategori_update', $kategori->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="kategori">Edit Katagori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" value="{{ $kategori->nama_kategori }}">
                                @error('subKategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary mb-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
