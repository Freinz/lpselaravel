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

                </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Nama Kota</label>
                      <input type="text" class="form-control" name="nama_kota"
                        value="{{$data->nama_kota}}">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Kategori</label>
                      <input type="text" class="form-control" name="kategori"
                        value="{{$data->kategori}}">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Sub-Kategori</label>
                      <input type="text" class="form-control" name="sub_kategori" value="{{$data->sub_kategori}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Satuan</label>
                      <input type="text" class="form-control" name="satuan" value="{{$data->satuan}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Merk</label>
                      <input type="text" class="form-control" name="merk" value="{{$data->merk}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Harga</label>
                      <input type="number" class="form-control" name="harga" value="{{$data->harga}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                  </form>
                </div>
                
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection