@extends('managementdata.main')

@section('title', 'Home')
@section('breadcrumb-item', 'Dashboard')

@section('breadcrumb-item-active', 'Home')

@section('css')
    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">
@endsection

@section('content')