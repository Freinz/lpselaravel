@extends('pimpinan.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')

@section('breadcrumb-item-active', 'Kumpulan Data Provinsi Kalimantan Selatan')

@section('css')
    <!-- [Page specific CSS] start -->
    <!-- data tables css -->
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
                  <table id="multi-table" class="table table-striped table-bordered nowrap">

                  <thead>
                        <tr>
                            <th>Nama Kota</th>
                            <th>Kategori</th>
                            <th>Sub-Kategori</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Merk</th>
                            <th>Harga</th>
                            <th>Status Permintaan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                    
                        <tbody>
                    @foreach ($superadmin as $spadmin )
                      @if ($spadmin -> status == 'ditunda')
                        <tr>
                            <td>{{$spadmin->nama_kota}}</td>
                            <td>{{$spadmin->kategori}}</td>
                            <td>{{$spadmin->sub_kategori}}</td>
                            <td>{{$spadmin->nama_barang}}</td>
                            <td>{{$spadmin->satuan}}</td>
                            <td>{{$spadmin->merk}}</td>
                            <td>{{$spadmin->harga}}</td>
                            <td>{{$spadmin->status}}</td>
                            <td>
                            <form action="/update_status/{{ $spadmin->form_id }}" method="POST">
                              @csrf
                              @method('PUT') <!-- Jika menggunakan metode PUT atau PATCH -->
                              <select class="btn btn-light-secondary" name="status">
                                  <option value="ditunda" {{ $spadmin->status == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
                                  <option value="diterima" {{ $spadmin->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                  <option value="ditolak" {{ $spadmin->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                              </select>
                              <button type="submit" class="btn btn-primary">Update Status</button>
                          </form>

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
    <script>
$(document).ready(function() {
  // Inisialisasi DataTables
  $('#multi-table').DataTable({
    dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
  });
});
</script>
    <!-- [Page Specific JS] end -->
@endsection