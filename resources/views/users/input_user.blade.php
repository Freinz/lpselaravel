@extends('layouts.main')

<style type="text/css">
        
        .div_center {
            text-align: center;
            margin: auto;
        }

        .title_desain {
            color: black;
            padding: 25px;
            font-size: 40px;
            font-weight: bold;
        }

        label {
            dipslay: inline-block;
            width: 200px;
        }

        .div_pad {
            padding: 15px;
        }

    </style>

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')

@section('breadcrumb-item-active', 'User')

@section('css')
@endsection

@section('content')
        <div class="row">
          <!-- [ Row 1 ] start -->
          <h1 class="title_desain">Add User</h1>

<form action="{{url('store_user')}}" method="Post" enctype="multipart/form-data">

@csrf

<div class="div_pad">
  <label>User Name</label>
  <input type="text" name="user_name" id="">
</div>

<div class="div_pad">
  <label>Role User</label>
  <input type="text" name="role_user" id="">
</div>


<div class="div_pad">
  <label>Address</label>
  <input type="text" name="address_user" id="">
</div>

<div class="div_pad">
  <label>Phone</label>
  <input type="text" name="phone_user" id="">
</div>

<div class="div_pad">
    <input type="submit" value="Add User" class="btn btn-info">
</div>


          <!-- [ Row 1 ] end -->
        </div>
@endsection