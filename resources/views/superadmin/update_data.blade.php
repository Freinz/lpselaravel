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
                  <form action="{{url('data_edit', $data->id)}}" method="Post" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group">
                <label class="form-label" for="exampleInputEmail1">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{$data->kategori}}">
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
                <label for="merk">Merk</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk" value="{{ old('merk', $data->merk) }}">
                @error('merk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Banjarmasin</label>
                <input type="number" class="form-control @error('banjarmasin') is-invalid @enderror" name="banjarmasin" value="{{$data->banjarmasin}}">
                @error('banjarmasin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Banjarbaru</label>
                <input type="number" class="form-control @error('banjarbaru') is-invalid @enderror" name="banjarbaru" value="{{$data->banjarbaru}}">
                @error('banjarbaru')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Kab. Banjar</label>
                <input type="number" class="form-control @error('banjar') is-invalid @enderror" name="banjar" value="{{$data->banjar}}">
                @error('banjar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Batola</label>
                <input type="number" class="form-control @error('batola') is-invalid @enderror" name="batola" value="{{$data->batola}}">
                @error('batola')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Tapin</label>
                <input type="number" class="form-control @error('tapin') is-invalid @enderror" name="tapin" value="{{$data->tapin}}">
                @error('tapin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga HSS</label>
                <input type="number" class="form-control @error('hss') is-invalid @enderror" name="hss" value="{{$data->hss}}">
                @error('hss')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga HST</label>
                <input type="number" class="form-control @error('hst') is-invalid @enderror" name="hst" value="{{$data->hst}}">
                @error('hst')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga HSU</label>
                <input type="number" class="form-control @error('hsu') is-invalid @enderror" name="hsu" value="{{$data->hsu}}">
                @error('hsu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Balangan</label>
                <input type="number" class="form-control @error('balangan') is-invalid @enderror" name="balangan" value="{{$data->balangan}}">
                @error('balangan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Tabalong</label>
                <input type="number" class="form-control @error('tabalong') is-invalid @enderror" name="tabalong" value="{{$data->tabalong}}">
                @error('tabalong')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Tanah Laut</label>
                <input type="number" class="form-control @error('tanah_laut') is-invalid @enderror" name="tanah_laut" value="{{$data->tanah_laut}}">
                @error('tanah_laut')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Tanah Bumbu</label>
                <input type="number" class="form-control @error('tanah_bumbu') is-invalid @enderror" name="tanah_bumbu" value="{{$data->tanah_bumbu}}">
                @error('tanah_bumbu')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="exampleInputPassword1">Harga Kotabaru</label>
                <input type="number" class="form-control @error('kotabaru') is-invalid @enderror" name="kotabaru" value="{{$data->kotabaru}}">
                @error('kotabaru')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
                  
                    
                    <button type="submit" class="btn btn-primary mb-4">Update Data</button>
                
                </div>
                
              
                  </form>
                
        <!-- [ form-element ] end -->
      </div>
@endsection

      