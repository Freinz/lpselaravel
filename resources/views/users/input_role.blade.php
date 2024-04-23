@extends('layouts.main')

<style type="text/css">

.div_center {
  text-align : center;
  margin: aut;
}

.cat_label {
  font-size : 30px;
  font-weight: bold;
  padding: 30px;
  color: white;
}

.center {
  margin: auto;
  width: 50%;
  text-align: center;
  margin-top: 50px;
  border: 1px solid white;
}

th {
  background-color: skyblue;
  padding: 10px;
}

tr {
  border:1px solid white;
  padding: 10px;
}

</style>

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')

@section('breadcrumb-item-active', 'User')

@section('css')
@endsection

@section('content')
<div class="div_center">

<div>



  @if(session()->has('message'))

  <div class="alert alert-success">
    
  <button type="button" class="close" data-dismiss="alert" aria-hidden="True">x</button>

  
    {{session()->get('message')}}
    
  </div>

  @endif
</div>

    <h1 class="cat_label">Add Role</h1>

    <form action="{{url('role_add')}}" method="Post">

      @csrf

      <span style="padding-right: 15px;">
      <label for="">Role Name</label>
      <input type="text" name="role" required>
      </span>

      <input class="btn btn-primary" type="submit" value="Add Role">
    </form>

    <div>

    <table class="center">

    <tr>
      <th>Role Name</th>
      <th>Action</th>
    </tr>

    @foreach($data as $data)
    <tr>
      <td>{{$data->role_name}}</td>
      <td>
        <a  class="btn btn-info" href="{{url('role_read', $data->id)}}">Update</a>

        <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('role_delete', $data->id)}}">Delete</a>
      </td>
    
  
    </tr>

    
    @endforeach
  
    
    </table>

    </div>

</div>

</div>
</div>
</div>
@endsection