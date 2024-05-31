@extends('superadmin.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Forms')

@section('breadcrumb-item-active', 'Input User')

@section('css')
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
              <div class="row">
                <div class="col-md-6">
                  <form action="{{url('user_edit', $data->id)}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{$data->name}}">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{$data->email}}">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            

                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

      