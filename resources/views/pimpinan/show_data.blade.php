@extends('pimpinan.main')

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
                <!-- Filter -->
                <div class="mb-3 d-flex justify-content-start grid gap-3">

                    <div class="dropdown">
                        <a class="btn btn-info dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="filterKotaBtn">
                            Filter Kota
                        </a>
                        <ul class="dropdown-menu" id="kotaDropdown">
                            <li><a class="dropdown-item" href="#" onclick="filterKota('')">Semua Kota</a></li>
                        </ul>
                    </div>

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
                                <th>Nama Kota</th>
                                <th>Kategori</th>
                                <th>Sub-Kategori</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th>Edit & Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($tabelproduk as $tabelproduk)
                            @if ($tabelproduk->status == 'diterima')
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{$tabelproduk->kota->nama_kota}}</td>
                                <td>{{$tabelproduk->kategori->nama_kategori}}</td>
                                <td>{{$tabelproduk->subKategori->nama_subkategori}}</td>
                                <td>{{$tabelproduk->nama_barang}}</td>
                                <td>{{$tabelproduk->satuan}}</td>
                                <td>{{$tabelproduk->merk}}</td>
                                <td>Rp. {{ $tabelproduk->harga }}</td>

                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-light-primary">
                                            <a href="{{ url('data_read', $tabelproduk->id) }}">Edit</a>
                                        </button>
                                        <button type="button" class="btn btn-light-danger delete-button" data-id="{{ $tabelproduk->id }}">Hapus</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            }]
        });

        var categories = [];
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var category = data[2]; // Kategori
            if (categories.indexOf(category) === -1) {
                categories.push(category);
            }
        });

        categories.forEach(function(category) {
            $('#kategoriDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterKategori(\'' + category + '\')">' + category + '</a></li>');
        });

        // Populate Kota dropdown
        var cities = [];
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var city = data[1]; // Nama Kota
            if (cities.indexOf(city) === -1) {
                cities.push(city);
            }
        });

        cities.forEach(function(city) {
            $('#kotaDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterKota(\'' + city + '\')">' + city + '</a></li>');
        });

        // Handle Kota filter
        window.filterKota = function(city) {
            table.column(1).search(city).draw();
            $('#filterKotaBtn').text(city ? 'Kota: ' + city : 'Filter Kota');
        };

        window.filterKategori = function(kategori) {
            $('#subKategoriDropdown').empty().append('<li><a class="dropdown-item" href="#" onclick="filterSubKategori(\'\')">Semua Sub-Kategori</a></li>');
            var subCategories = [];

            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                var category = data[2];
                var subCategory = data[3];

                if (category === kategori && subCategories.indexOf(subCategory) === -1) {
                    subCategories.push(subCategory);
                }
            });

            subCategories.forEach(function(subCategory) {
                $('#subKategoriDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterSubKategori(\'' + subCategory + '\')">' + subCategory + '</a></li>');
            });

            table.column(2).search(kategori).draw();
            $('#filterKategoriBtn').text(kategori ? 'Kategori: ' + kategori : 'Filter Kategori');
        };

        window.filterSubKategori = function(subKategori) {
            table.column(3).search(subKategori).draw();
            $('#filterSubKategoriBtn').text(subKategori ? 'Sub-Kategori: ' + subKategori : 'Filter Sub-Kategori');
        };

        window.filterKota = function(kota) {
            table.column(1).search(kota).draw();
            $('#filterKotaBtn').text(kota ? 'Kota: ' + kota : 'Filter Kota');
        };

        window.resetFilters = function() {
            $('#filterKotaBtn').text('Filter Kota');
            $('#filterKategoriBtn').text('Filter Kategori');
            $('#filterSubKategoriBtn').text('Filter Sub-Kategori');

            table.columns().search('').draw();
        };
    });
</script>
@endsection