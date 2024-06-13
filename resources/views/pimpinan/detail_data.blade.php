@extends('pimpinan.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')

@section('breadcrumb-item-active', 'Kumpulan Data Provinsi Kalimantan Selatan')

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
                            <th>No</th>
                            <th>Nama Pengirim</th>
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
                        @php $nomor = 1; @endphp
                    @foreach ($superadmin as $spadmin )
                      @if ($spadmin -> status == 'ditunda')
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $spadmin->form->nama }}</td>
                            <td>{{$spadmin->nama_kota}}</td>
                            <td>{{$spadmin->kategori}}</td>
                            <td>{{$spadmin->sub_kategori}}</td>
                            <td>{{$spadmin->nama_barang}}</td>
                            <td>{{$spadmin->satuan}}</td>
                            <td>{{$spadmin->merk}}</td>
                            <td>{{$spadmin->harga}}</td>
                            <td>{{$spadmin->status}}</td>
                            <td>
                         
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirim Respon</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Action</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/update_status/{{ $spadmin->form_id }}" method="POST">
                                                @csrf
                                                @method('PUT') <!-- Jika menggunakan metode PUT atau PATCH -->

                                                
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Aksi</label>
                                                    <select class="btn btn-light-secondary" name="status">
                                                        <option value="ditunda" {{ $spadmin->status == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
                                                        <option value="diterima" {{ $spadmin->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                                        <option value="ditolak" {{ $spadmin->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Pesan:</label>
                                                    <textarea class="form-control" name="keterangan" id="message-text"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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