@extends('superadmin.main')

@section('title')
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
                {{-- Filter --}}
                <div class="mb-3 d-flex justify-content-start grid gap-3">
                   
                    <div class="dropdown">
                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="filterKategoriBtn">
                            Filter Kategori
                        </a>
                        <ul class="dropdown-menu" id="kategoriDropdown">
                            <li><a class="dropdown-item" href="#" onclick="filterKategori('')">Semua Kategori</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="filterSubKategoriBtn">
                            Filter Sub-Kategori
                        </a>
                        <ul class="dropdown-menu" id="subKategoriDropdown">
                            <li><a class="dropdown-item" href="#" onclick="filterSubKategori('')">Semua Sub-Kategori</a></li>
                        </ul>
                    </div>
                    <div class="btn btn-info" onclick="resetFilters()">
                        Reset Filters
                    </div>
                </div>

                <!-- Button trigger modal -->
               
                <div class="table-responsive dt-responsive">
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Sub-Kategori</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Merk</th>
                                <th>Banjarmasin</th>
                                <th>Banjarbaru</th>
                                <th>Banjar</th>
                                <th>Batola</th>
                                <th>Tapin</th>
                                <th>HSS</th>
                                <th>HST</th>
                                <th>HSU</th>
                                <th>Balangan</th>
                                <th>Tabalong</th>
                                <th>Tanah Laut</th>
                                <th>Tanah Bumbu</th>
                                <th>Kotabaru</th>
                                <th>Edit & Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($superadmin as $spadmin)
                            @if ($spadmin->status == 'diterima')
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{$spadmin->kategori}}</td>
                                <td>{{$spadmin->sub_kategori}}</td>
                                <td>{{$spadmin->nama_barang}}</td>
                                <td>{{$spadmin->satuan}}</td>
                                <td>{{$spadmin->merk}}</td>
                                <td>Rp. {{ number_format($spadmin->banjarmasin, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->banjarbaru, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->banjar, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->batola, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->tapin, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->hss, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->hst, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->hsu, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->balangan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->tabalong, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->tanah_laut, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->tanah_bumbu, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($spadmin->kotabaru, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-light-primary">
                                            <a href="{{ url('data_read', $spadmin->id) }}">Edit</a>
                                        </button>
                                        <button type="button" class="btn btn-light-danger delete-button" data-id="{{ $spadmin->id }}">Hapus</button>
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
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').on('click', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Iya, Hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/data_delete/" + id;
                }
            });
        });

        // Inisialisasi DataTables
        var table = $('#basic-btn').DataTable({
            "dom": 'Bfrtip',
            "buttons": [{
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:last-child)' // Mengecualikan kolom terakhir
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:last-child)' // Mengecualikan kolom terakhir
                    }
                }
            ],
            "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 1, 2, -1]
                } // Disable sorting for Kota, Kategori, Sub-Kategori, and Update & Delete columns
            ]
        });


        // Populate Kategori dropdown
        var categories = [];
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var category = data[1]; // Kategori
            if (categories.indexOf(category) === -1) {
                categories.push(category);
            }
        });

        categories.forEach(function(category) {
            $('#kategoriDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterKategori(\'' + category + '\')">' + category + '</a></li>');
        });

        
        // Handle Kategori filter
        window.filterKategori = function(kategori) {
            $('#subKategoriDropdown').empty().append('<li><a class="dropdown-item" href="#" onclick="filterSubKategori(\'\')">Semua Sub-Kategori</a></li>');
            var subCategories = [];

            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                var category = data[1]; // Kategori
                var subCategory = data[2]; // Sub-Kategori

                if (category === kategori && subCategories.indexOf(subCategory) === -1) {
                    subCategories.push(subCategory);
                }
            });

            subCategories.forEach(function(subCategory) {
                $('#subKategoriDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterSubKategori(\'' + subCategory + '\')">' + subCategory + '</a></li>');
            });

            table.column(1).search(kategori).draw();
            $('#filterKategoriBtn').text(kategori ? 'Kategori: ' + kategori : 'Filter Kategori');
        };

        // Handle Sub-Kategori filter
        window.filterSubKategori = function(subKategori) {
            table.column(2).search(subKategori).draw();
            $('#filterSubKategoriBtn').text(subKategori ? 'Sub-Kategori: ' + subKategori : 'Filter Sub-Kategori');
        };

        // Reset all filters
        window.resetFilters = function() {
            $('#filterKategoriBtn').text('Filter Kategori');
            $('#filterSubKategoriBtn').text('Filter Sub-Kategori');

            table.columns().search('').draw();
        };
    });
</script>
<!-- [Page Specific JS] end -->
@endsection