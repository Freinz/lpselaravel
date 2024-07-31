@extends('superadmin.main')

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')
@section('breadcrumb-item-active', 'Nama Kota')

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('kota_update', $kota->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Edit Nama Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ $kota->nama_kota }}">
                                @error('kota')
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
