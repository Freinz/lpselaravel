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
                  <form action="{{url('store_user')}}" method="Post" enctype="multipart/form-data">

                  @csrf

      <div class="form-group">
        <label class="form-label" for="name">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Nama" value="{{ old('name') }}">
        @error('name')
         <div class="invalid-feedback">{{ $message }}</div>
       @enderror
    </div>
                    
    <div class="form-group">
        <label class="form-label" for="email">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}">
        @error('email')
         <div class="invalid-feedback">{{ $message }}</div>
       @enderror
    </div>
                    
    <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password">
        @error('password')
         <div class="invalid-feedback">{{ $message }}</div>
       @enderror
    </div>
    
    <div class="form-group">
        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Password Again">
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
          

                    <!-- <div class="form-group">
                      <label class="form-label">Role User</label>
<br>
                      <select class="btn btn-light-secondary" name="role" required>

                      <option >Select Role</option>
                      @foreach($data as $data)

                      <option  value="{{$data->id}}">{{$data->name}}</option>

                      @endforeach
                      </select>

                    </div> -->

                    <!-- <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Alamat</label>
                      <input type="text" class="form-control" name="address_user" placeholder="Masukkan Alamat">
                    </div>

                   

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">No Handphone</label>
                      <input type="number" class="form-control" name="phone_user" placeholder="No Handphone" required>
                    </div> -->
                    
               
                  
                </div>
                
                <!-- <div class="col-md-6">
            

                  <div class="form-group">
                    <label class="form-label">NIP</label>
                    <input type="number" class="form-control" name="nip" placeholder="NIP">
                  </div>
                  <div class="form-group">
                    <label class="form-label">No KTP</label>
                    <input type="number" class="form-control" name="no_ktp" placeholder="No KTP">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir">
                  </div> -->
                </form>
                 
                
                  </form>

                
        <!-- [ form-element ] end -->
      </div>
@endsection



