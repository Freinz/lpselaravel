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
                                    <th>No</th>
                                    <th>Nama Pengirim</th>
                                    <th>Nama Kota</th>
                                    <th>Kategori</th>
                                    <th>Sub-Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Merk</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Keterangan Salah</th>
                                    <th>Update & Delete</th>
                                    <th>Kirim Revisi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @php $nomor = 1; @endphp
                                @foreach ($superadmin as $spadmin)
                                    @if ($spadmin->status == 'ditolak')
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{$spadmin->form->nama  }}</td>
                                            <td>{{$spadmin->nama_kota}}</td>
                                            <td>{{$spadmin->kategori}}</td>
                                            <td>{{$spadmin->sub_kategori}}</td>
                                            <td>{{$spadmin->nama_barang}}</td>
                                            <td>{{$spadmin->satuan}}</td>
                                            <td>{{$spadmin->merk}}</td>
                                            <td>{{$spadmin->harga}}</td>
                                            <td>{{$spadmin->status}}</td>
                                            <td>{{$spadmin->form->keterangan}}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="button" class="btn btn-light-primary">
                                                        <a href="{{ url('revisi_read', $spadmin->id) }}">Update</a>
                                                    </button>
                                                    <button type="button" class="btn btn-light-danger delete-button" data-id="{{ $spadmin->id }}">Delete</button>
                                                </div>
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirim Revisi</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/revisi_update_status/{{ $spadmin->form_id }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Jika menggunakan metode PUT atau PATCH -->
                        <div class="mb-3">
                            <input type="hidden" name="status" value="ditunda">
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
    <script src="{{ URL::asset('build/js/plugins/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/buttons.bootstrap5.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/plugins/datepicker-full.min.js') }}"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       // SweetAlert2 untuk tombol Kirim Revisi
       $('#send-message').on('click', function() {
            Swal.fire({
                title: "Apakah Data Sudah Diperbaiki?",
                text: "Data akan dikirimkan ke admin!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, data sudah diperbaiki!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Terkirim!",
                        text: "Data Anda telah dikirim.",
                        icon: "success"
                    }).then(() => {
                        // Lakukan aksi lain di sini, seperti mengirimkan data
                        $('#exampleModal').modal('hide');
                    });
                }
            });
        });

        // SweetAlert2 untuk tombol Delete
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('revisi_delete') }}/" + id;
                    }
                });
            });
        });
    </script> -->

    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('#pc-datepicker-1'), {
                buttonClass: 'btn'
            });
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('revisi_delete') }}/" + id;
                    }
                });
            });
        });
    </script>

    <script>
        // Inisialisasi DataTables
        $('#multi-table').DataTable({
            dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });

        // [ HTML5 Export Buttons ]
        $('#basic-btn').DataTable({
            dom: 'frtip',
            buttons: ['excel', 'print']
        });

        // [ Column Selectors ]
        $('#cbtn-selectors').DataTable({
            dom: 'frtip',
            buttons: [{
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
            dom: 'frtip',
            buttons: [{
                extend: 'excelHtml5',
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="F"]', sheet).each(function() {
                        if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                            $(this).attr('s', '20');
                        }
                    });
                }
            }]
        });

        // [ Custom File (JSON) ]
        $('#pdf-json').DataTable({
            dom: 'frtip',
            buttons: [{
                text: 'JSON',
                action: function(e, dt, button, config) {
                    var data = dt.buttons.exportData();
                    $.fn.dataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
                }
            }]
        });
    </script>
    <!-- [Page Specific JS] end -->
@endsection

