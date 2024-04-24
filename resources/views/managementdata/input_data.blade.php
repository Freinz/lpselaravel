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
              <h5>Data Control</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="{{url('store_data')}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" name="user_name"
                        placeholder="Enter User Name">
                    
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Role User</label>
                      <input type="text" class="form-control" name="role_user" placeholder="Role User">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" name="address_user" placeholder="Address User">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Phone</label>
                      <input type="text" class="form-control" name="phone_user" placeholder="Phone">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                  </form>
                </div>
                
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection