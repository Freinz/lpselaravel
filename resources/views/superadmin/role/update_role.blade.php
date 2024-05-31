@extends('superadmin.main')

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')
@section('breadcrumb-item-active', 'User')

@section('css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('role_update', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Input Role</label>
                                <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $data->name }}">
                                @error('role')
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
