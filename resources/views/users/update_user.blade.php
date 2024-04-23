@extends('layouts.main')

@section('title', 'User List')
@section('breadcrumb-item', 'Profile')

@section('breadcrumb-item-active', 'User List')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}" >

<style>

.div_center {
    text-align: center;
    margin: auto;
}

.title {
    color: Black;
    padding: 30px;
    font-size: 40px;
    font-weight: bold;
}

label {
    display:inline-block;
    width: 200px;
}

.div_padding {
    padding: 10px;
}

</style>
@endsection

@section('content')
      <!-- [ Main Content ] start -->
    
      <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
  
      <!-- body -->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

        <div class="div_center">

        <h1 class="title">Update User</h1>

        <form action="{{url('user_edit', $data->id)}}" method="Post" enctype="multipart/form-data">

        @csrf
      
        
        <div class="div_padding">
            <label>User Name</label>
            <input type="text" name="user_name" value="{{$data->user_name}}">
        </div>

        <div class="div_padding">
            <label>Role User</label>
            <input type="text" name="role_user" value="{{$data->role_user}}">
        </div>

        <div class="div_padding">
            <label>Address User</label>
            <input type="text" name="address_user" value="{{$data->address_user}}">
        </div>

        <div class="div_padding">
            <label>Phone User</label>
            <input type="number" name="phone_user" value="{{$data->phone_user}}">
        </div>

        <div class="div_padding">
            <input type="submit" class="btn btn-info" value="Update User">
        </div>

        </form>


        </div>

            </div>
       </div>
    </div>


      <!-- [ Main Content ] end -->

@endsection

@section('scripts')

  <!-- [Page Specific JS] start -->
  <script src="{{ URL::asset('build/js/plugins/simple-datatables.js') }}"></script>
  <script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
      sortable: false,
      perPage: 5
    });
  </script>
  <!-- [Page Specific JS] end -->
@endsection