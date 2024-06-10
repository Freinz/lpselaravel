@extends('operator.main')

@section('title', 'Advance Initialization')
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
                  <thead>
                        <tr>
                            <th>Nama Kota</th>
                            <th>Kategori</th>
                            <th>Sub-Kategori</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Merk</th>
                            <th>Harga</th>
                      
                          </tr>
                        </thead>
                    
                        <tbody>
                    @foreach ($superadmin as $spadmin )
                      @if ($spadmin->status == 'ditunda')
                    
                        <tr>
                            <td>{{$spadmin->nama_kota}}</td>
                            <td>{{$spadmin->kategori}}</td>
                            <td>{{$spadmin->sub_kategori}}</td>
                            <td>{{$spadmin->nama_barang}}</td>
                            <td>{{$spadmin->satuan}}</td>
                            <td>{{$spadmin->merk}}</td>
                            <td>{{$spadmin->harga}}</td>
                           
                          
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
  $('#multi-table').DataTable({
    dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
  });
});
</script>

<script>
        // [ HTML5 Export Buttons ]
        $(document).ready(function() {
        $('#basic-btn').DataTable({
          dom: 'Bfrtip',
          buttons: ['excel', 'print']
        });
      });

        // [ Column Selectors ]
        $('#cbtn-selectors').DataTable({
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'copyHtml5',
              exportOptions: {
                columns: [0, ':visible']
              }
            },
            {
              extend: 'excelHtml5',
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdfHtml5',
              exportOptions: {
                columns: [0, 1, 2, 5]
              }
            },
            'colvis'
          ]
        });

        // [ Excel - Cell Background ]
        $('#excel-bg').DataTable({
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'excelHtml5',
              customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="F"]', sheet).each(function () {
                  if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                    $(this).attr('s', '20');
                  }
                });
              }
            }
          ]
        });

        // [ Custom File (JSON) ]
        $('#pdf-json').DataTable({
          dom: 'Bfrtip',
          buttons: [
            {
              text: 'JSON',
              action: function (e, dt, button, config) {
                var data = dt.buttons.exportData();
                $.fn.dataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
              }
            }
          ]
        });
      </script>
    <!-- [Page Specific JS] end -->
@endsection