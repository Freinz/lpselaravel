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
                            <th>Nama Pengirim</th>
                            <th>Tanggal Survey</th>
                            <th>Periode</th>
                            <th>Cek Detail Data</th>
                          </tr>
                        </thead>
                    
                        <tbody>
                    @foreach ($form as $form )
                      @if ($form -> status == 'ditolak')
                        <tr>
                            <td>{{ $form->nama }}</td>
                            <td>{{$form->tgl_survey}}</td>
                            <td>{{$form->periode}}</td>
                            <td>
                              <a href="{{ url('detail_revisi/'.$form->id)}}">Klik ini untuk melihat detail data</a>
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
            dom: 'rtip',
            buttons: ['excel', 'print']
        });

        // [ Column Selectors ]
        $('#cbtn-selectors').DataTable({
            dom: 'rtip',
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
            dom: 'rtip',
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
            dom: 'rtip',
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

