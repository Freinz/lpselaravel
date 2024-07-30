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
                <label class="form-label" for="kota">Nama Kota</label>
                <select class="form-control @error('kota_id') is-invalid @enderror" name="kota_id">
                  @foreach($kotas as $kota)
                  <option value="{{ $kota->id }}" {{ $kota->id == $data->kota_id ? 'selected' : '' }}>
                    {{ $kota->nama_kota }}
                  </option>
                  @endforeach
                </select>
                @error('kota_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="kategori">Kategori</label>
                <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                  @foreach($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ $kategori->id == $data->kategori_id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                  </option>
                  @endforeach
                </select>
                @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label" for="sub_kategori">Sub-Kategori</label>
                <select class="form-control @error('sub_kategori_id') is-invalid @enderror" name="sub_kategori_id" id="sub_kategori_id">
                  <!-- Sub-kategori akan dimuat secara dinamis -->
                </select>
                @error('sub_kategori_id')
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
                <label class="form-label" for="harga">Harga</label>
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


        @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          $(document).ready(function() {
            function loadSubKategori(kategoriId, selectedSubKategoriId = null) {
              $.ajax({
                url: '{{ url("get_subkategori") }}/' + kategoriId,
                type: 'GET',
                success: function(data) {
                  $('#sub_kategori_id').empty();
                  $.each(data, function(key, value) {
                    $('#sub_kategori_id').append('<option value="' + value.id + '">' + value.nama_subkategori + '</option>');
                  });

                  if (selectedSubKategoriId) {
                    $('#sub_kategori_id').val(selectedSubKategoriId);
                  }
                }
              });
            }

            var selectedKategoriId = $('#kategori_id').val();
            var selectedSubKategoriId = '{{ $data->sub_kategori_id }}';
            if (selectedKategoriId) {
              loadSubKategori(selectedKategoriId, selectedSubKategoriId);
            }

            $('#kategori_id').change(function() {
              var kategoriId = $(this).val();
              loadSubKategori(kategoriId);
            });
          });
        </script>
        @endsection