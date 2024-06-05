@extends('operator.main')

@section('title', 'Form Elements')
@section('breadcrumb-item', 'Forms')

@section('breadcrumb-item-active', 'Input User')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/datepicker-bs5.min.css') }}">

@endsection

@section('content')
      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Formulir Verifikasi</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="{{url('store_form')}}" method="Post" enctype="multipart/form-data">

                  @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        placeholder="masukan Nama" value="{{ old('nama') }}">  
                          @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal Survey</label>
                       
                        <input type="text" class="form-control @error('tgl_survey') is-invalid @enderror" placeholder="isi tanggal" name="tgl_survey" id="pc-datepicker-1" value="{{ old('tgl_survey') }}">
                          @error('tgl_survey')
                             <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                    </div>
                    
                    <div class="form-group">
                    <label class="form-label @error('periode') is-invalid @enderror" for="exampleSelect1" value="{{ old('periode') }}">Periode</label>
                    <select class="form-select" id="exampleSelect1" name="periode">
                        <option>1</option>
                        <option>2</option>
                    </select>
                    @error('periode')
                             <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                   
                <div class="form-group">
                    <label class="form-label @error('ket_salah') is-invalid @enderror" for="exampleSelect1" value="{{ old('ket_salah') }}">Keterangan Salah</label>
                    <input type="text" class="form-control @error('ket_salah') is-invalid @enderror" placeholder="Isi KeteranganP" name="ket_salah" id="pc-datepicker-1" value="{{ old('ket_salah') }}">
                    @error('ket_salah')
                             <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-4">Submit</button>
                   
                </form>
                
                
        <!-- [ form-element ] end -->
      </div>

      
@endsection

@section('scripts')
<script src="{{ URL::asset('build/js/plugins/datepicker-full.min.js') }}"></script>
<script>
    (function() {
    const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
      buttonClass: 'btn'
    });
  })();
</script>

@endsection



