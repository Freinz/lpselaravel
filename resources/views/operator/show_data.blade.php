@extends('operator.main')

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

                 <!-- Button trigger modal -->
                 <div class="col-auto"> 
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                     Import Data
                   </button>
                 </div> 

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <form action="/importexcel" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="modal-body">
                      <div class="formgroup">
                        <input type="file" name="file" required>
                      </div>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </form>

                </div>
              </div>

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
                    @foreach ($managementdata as $mgdata )
                    
                        <tr>
                            <td>{{$mgdata->nama_kota}}</td>
                            <td>{{$mgdata->kategori}}</td>
                            <td>{{$mgdata->sub_kategori}}</td>
                            <td>{{$mgdata->nama_barang}}</td>
                            <td>{{$mgdata->satuan}}</td>
                            <td>{{$mgdata->merk}}</td>
                            <td>{{$mgdata->harga}}</td>
                          
                      </tr>
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