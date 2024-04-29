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
                  <form action="{{url('data_edit', $data->id)}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Nama Kota</label>
                      <input type="text" class="form-control" name="nama_kota"
                        value="{{$data->nama_kota}}">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Jenis Barang</label>
                      <input type="text" class="form-control" name="jenis_barang"
                        value="{{$data->jenis_barang}}">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Harga Satuan</label>
                      <input type="number" class="form-control" name="harga_satuan" value="{{$data->harga_satuan}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Kuartal</label>
                      <input type="number" class="form-control" name="kuartal" value="{{$data->kuartal}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Tahun</label>
                      <input type="number" class="form-control" name="tahun" value="{{$data->tahun}}">
                    </div>
                  
                    
                    <button type="submit" class="btn btn-primary mb-4">Update User</button>
                
                </div>
                
              
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

      