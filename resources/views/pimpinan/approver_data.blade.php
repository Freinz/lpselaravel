@extends('pimpinan.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')

@section('breadcrumb-item-active', 'Kumpulan data yang perlu di Approve')

@section('css')
    <!-- [Page specific CSS] start -->
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
    <!-- [Page specific CSS] end -->
     <!-- Stylesheet -->
    <style>
        .hidden {
            display: none;
        }
    </style>
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
                            <th>Nama Pengirim</th>
                            <th>Tanggal Survey</th>
                            <th>Periode</th>
                            <th>Cek Detail Data</th>
                          </tr>
                        </thead>
                    
                        <tbody>
                    @foreach ($form as $form )
                      @if ($form -> status == 'ditunda')
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