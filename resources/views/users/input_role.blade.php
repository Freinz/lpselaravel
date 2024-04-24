@extends('layouts.main')

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
                  <form action="{{url('role_add')}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Input Role</label>
                      <input type="text" class="form-control" name="role"
                        placeholder="Enter Role">
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Submit</button>
                  </form>
                </div>
        </div>
      </div>
    </div>
  </div>
</div>
                
          
       <div class="col-sm-12">
          <div class="card border-0 table-card user-profile-list">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="pc-dt-simple">
                  <thead>
                    <tr>
                      <th>Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $data)
                    <tr>
                     
                      <td>{{$data->role_user}}</td>
                      <td>
                       
                        <div class="overlay-edit">
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item m-0"><a href="{{url('role_read', $data->id)}}" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a></li>
                            <li class="list-inline-item m-0"><a href="{{url('role_delete', $data->id)}}" class="avtar avtar-s btn bg-white btn-link-danger"><i class="ti ti-trash f-18"></i></a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

@endsection