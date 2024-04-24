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
                  <form action="{{url('store_user')}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">User Name</label>
                      <input type="text" class="form-control" name="user_name"
                        placeholder="Enter User Name">
                    </div>

                    <div class="form-group">
                      <label class="form-label">Role User</label>
<br>
                      <select class="btn btn-light-secondary" name="role" required>

                      <option >Select Role</option>
                      @foreach($data as $data)

                      <option  value="{{$data->id}}">{{$data->role_user}}</option>

                      @endforeach
                      </select>

                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" name="address_user" placeholder="Address User">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Phone</label>
                      <input type="number" class="form-control" name="phone_user" placeholder="Phone">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                  </form>
                </div>
                
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

