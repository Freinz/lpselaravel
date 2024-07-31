@extends('superadmin.main')

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
                        <form action="{{ url('subkategori_update', $subKategori->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="subKategori">Edit Nama Sub Kategori</label>
                                <input type="text" class="form-control @error('subKategori') is-invalid @enderror" name="subKategori" id="subKategori" value="{{ old('subKategori', $subKategori->nama_subkategori) }}">
                                @error('subKategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="kategori_id">Kategori</label>
                                <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                    @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $subKategori->kategori_id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
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
