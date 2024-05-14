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
                            <th>Update & Delete</th>
                          </tr>
                        </thead>
                    
                        <tbody>
                    @foreach ($superadmin as $spadmin )
                      @if ($spadmin->status == 'accepted')
                    
                        <tr>
                            <td>{{$spadmin->nama_kota}}</td>
                            <td>{{$spadmin->kategori}}</td>
                            <td>{{$spadmin->sub_kategori}}</td>
                            <td>{{$spadmin->nama_barang}}</td>
                            <td>{{$spadmin->satuan}}</td>
                            <td>{{$spadmin->merk}}</td>
                            <td>{{$spadmin->harga}}</td>
                            <td>
                            <div class="d-flex flex-wrap gap-2">
                              <button type="button" class="btn btn-light-primary"><a href="{{ url('data_read', $spadmin->id) }}">Update</a></button>
                              <button type="button" class="btn btn-light-danger" onclick="confirmation(event)"><a href="{{ url('data_delete', $spadmin->id) }}">Delete</a></button>
                          </div>
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

        <script type="text/javascript">
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);

          swal({
            title: "Anda yakin menghapus ini?",
            text: "Data yang dihapus akan permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          .then((willCancel) => {
            if (willCancel) {

              window.location.href = urlToRedirect;

            }
          });
          
        }
</script>

      
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