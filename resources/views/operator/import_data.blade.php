@extends('operator.main')

@section('title')
@section('breadcrumb-item', 'DataTable')

@section('breadcrumb-item-active', 'Kumpulan Data Provinsi Kalimantan Selatan')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/datepicker-bs5.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
  <!-- Row Grouping table start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive dt-responsive">
          <table id="basic-btn" class="table table-striped table-bordered nowrap">

            <!-- Button trigger modal -->
            <div class="col-auto">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Kirim Data
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Excel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form action="/importexcel" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                      <label class="form-label" for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $detail_user -> name }}" readonly>
                      @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label">Tanggal Survey</label>
                      <input type="text" class="form-control @error('tgl_survey') is-invalid @enderror" placeholder="isi tanggal" name="tgl_survey" id="pc-datepicker-1" value="">
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
                      <label class="form-label" for="kota_id">Kota</label>
                      <select class="form-select @error('kota_id') is-invalid @enderror" id="kota_id" name="kota_id">
                        @foreach ($kotas as $kota)
                        <option value="{{ $kota->id }}" {{ old('kota_id') == $kota->id ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                        @endforeach
                      </select>
                      @error('kota_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="kategori_id">Kategori</label>
                      <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                        @endforeach
                      </select>
                      @error('kategori_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label class="form-label" for="sub_kategori_id">Sub Kategori</label>
                      <select class="form-select @error('sub_kategori_id') is-invalid @enderror" id="sub_kategori_id" name="sub_kategori_id">
                        <option value="">Pilih Sub Kategori</option>
                      </select>
                      @error('sub_kategori_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="modal-body">
                      <div class="formgroup">
                        <input type="file" name="file" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Kirim Data</button>
                    </div>
                </div>
                </form>

              </div>
            </div>

            <thead>
              <tr>
                <th>Nama Pengirim</th>
                <th>Tanggal Survey</th>
                <th>Periode</th>
                <th>Cek Detail Data</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($form as $form )
              @if ($form->status == 'ditunda')
              <tr>
                <td>{{ $form->nama }}</td>
                <td>{{$form->tgl_survey}}</td>
                <td>{{$form->periode}}</td>
                <td>
                  <a href="{{ url('detail_data/'.$form->id)}}">Klik ini untuk melihat detail data</a>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Row Grouping table end -->
</div>
<!-- [ Main Content ] end -->

@endsection

@section('scripts')
<!-- [Page Specific JS] start -->
<!-- datatable Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/jszip.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/buttons.bootstrap5.min.js') }}"></script>

<script src="{{ URL::asset('build/js/plugins/datepicker-full.min.js') }}"></script>
<script>
  (function() {
    const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
      buttonClass: 'btn'
    });
  })();
</script>

<script>
  $(document).ready(function() {
    // Inisialisasi DataTables
    $('#basic-btn').DataTable({
      dom: 'frtip',
      buttons: ['excel', 'print']
    });

    // Handle category change and update subcategory
    $('#kategori_id').on('change', function() {
      var kategori_id = $(this).val();
      var sub_kategori_select = $('#sub_kategori_id');
      sub_kategori_select.empty(); // Clear existing options

      if (kategori_id) {
        $.ajax({
          url: '/sub-kategoris/' + kategori_id,
          method: 'GET',
          success: function(data) {
            sub_kategori_select.append('<option value="">Pilih Sub Kategori</option>');
            $.each(data, function(index, sub_kategori) {
              sub_kategori_select.append('<option value="' + sub_kategori.id + '">' + sub_kategori.nama_subkategori + '</option>');
            });
          }
        });
      } else {
        sub_kategori_select.append('<option value="">Pilih Sub Kategori</option>');
      }
    });
  });
</script>
<!-- [Page Specific JS] end -->
@endsection