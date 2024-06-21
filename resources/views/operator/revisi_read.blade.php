@extends('pimpinan.main')

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
                  <form action="{{url('revisi_edit', $data->id)}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Nama Kota</label>
                      <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" name="nama_kota"
                        value="{{$data->nama_kota}}">
                        @error('nama_kota')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Kategori</label>
                      <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                        value="{{$data->kategori}}">
                      @error('kategori')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                      </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Sub-Kategori</label>
                      <input type="text" class="form-control @error('sub_kategori') is-invalid @enderror" name="sub_kategori" value="{{$data->sub_kategori}}">
                      @error('sub_kategori')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Nama Barang</label>
                      <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{$data->nama_barang}}">
                      @error('nama_barang')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Satuan</label>
                      <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{$data->satuan}}">
                      @error('satuan')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Merk</label>
                      <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{$data->merk}}">
                      @error('merk')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="exampleInputPassword1">Harga</label>
                      <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$data->harga}}">
                      @error('harga')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  
                    
                    <button type="submit" class="btn btn-primary mb-4">Update Data</button>
                
                </div>
                
              
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

      