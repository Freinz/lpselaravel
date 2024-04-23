@extends('layouts.main')

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
                      <input type="text" class="form-control" name="user_name"
                        value="{{$data->user_name}}">
                    
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Role User</label>
                      <input type="text" class="form-control" name="role_user" value="{{$data->role_user}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" name="address_user" value="{{$data->address_user}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Phone</label>
                      <input type="number" class="form-control" name="phone_user" value="{{$data->phone_user}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-4">Update User</button>
                  </form>
                </div>
                
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

      