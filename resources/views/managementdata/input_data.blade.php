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
                      <label class="form-label">Input City</label>
<br>
                      <select class="btn btn-light-secondary" name="city" required>

                      <option >Select City</option>
                      @foreach($data as $data)

                      <option  value="{{$data->id}}">{{$data->nama_kota}}</option>

                      @endforeach
                      </select>

                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Jenis Barang</label>
                      <input type="text" class="form-control" name="jenis_barang"
                        placeholder="Enter Jenis Barang">
                    
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Harga Satuan</label>
                      <input type="number" class="form-control" name="harga_satuan" placeholder="Harga Satian">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Kuartal</label>
                      <input type="number" class="form-control" name="kuartal" placeholder="Kuartal">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Tahun</label>
                      <input type="number" class="form-control" name="tahun" placeholder="Tahun">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                  </form>
                </div>
                
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection