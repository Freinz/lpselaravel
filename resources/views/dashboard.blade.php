<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') LPSE Kalimantan Selatan</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective." />
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('image/lpselogo.png') }}" type="image/png">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">

    @yield('css')
    <!-- [Page specific CSS] end -->

    @include('layouts.head-css')
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    @include('layouts.loader')
    @include('layouts.sidebar')
    @include('layouts.topbar')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <div class='row'>
                <!-- [ Row 1 ] start -->
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Kategori</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img" class="img-fluid img-bg h-100">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jumlah_kategori }} <small class="text-muted">/100</small></h3>
                                <span class="badge bg-light-success ms-2">{{ intval($persentase_kategori) }}%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Progress Pendataan Jumlah Kategori</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-2" role="progressbar" style="width: {{ $persentase_kategori }}%" aria-valuenow="{{ $persentase_kategori }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Barang Yang Terdata</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-2.svg') }}" alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0"> {{ $total_barang }} </h3>
                                <span class="badge bg-light-primary ms-2">Barang Yang Terdata</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Total Barang</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Kota Yang Terdata</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jumlah_kota }} <small class="text-muted">/13</small></h3>
                                <span class="badge bg-light-danger ms-2">{{ intval($persentase_kota) }}%</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Progress Pendataan Nama Kota</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: {{ $persentase_kota }}%" aria-valuenow="{{ $persentase_kota }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Row 1 ] end -->
            </div>



            <!-- Row Grouping table start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- Filter --}}
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $nomor = 1; @endphp
                                        @foreach ($tabelproduk as $tbproduk)
                                        @if ($tbproduk->status == 'diterima')
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $tbproduk->kota->nama_kota }}</td>
                                            <td>{{ $tbproduk->kategori->nama_kategori }}</td>
                                            <td>{{ $tbproduk->subKategori->nama_subkategori }}</td>
                                            <td>{{ $tbproduk->nama_barang }}</td>
                                            <td>{{ $tbproduk->satuan }}</td>
                                            <td>{{ $tbproduk->merk }}</td>
                                            <td>Rp. {{ number_format($tbproduk->harga, 0, ',', '.') }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Grouping table end -->

            @if(View::hasSection('breadcrumb-item'))
            @include('layouts.breadcrumb')
            @endif

            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('layouts.footer')
    @include('layouts.customizer')

    @include('layouts.footerjs')

    @yield('scripts')

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
            var table = $('#basic-btn').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'print'],
                language: {
                    search: "_INPUT_", // Customizing the search input
                    searchPlaceholder: "Cari Barang",
                }
            });



            // Populate Kategori dropdown
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

            // Handle Kategori filter
            window.filterKategori = function(kategori) {
                $('#subKategoriDropdown').empty().append('<li><a class="dropdown-item" href="#" onclick="filterSubKategori(\'\')">Semua Sub-Kategori</a></li>');
                var subCategories = [];

                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    var category = data[2]; // Kategori
                    var subCategory = data[3]; // Sub-Kategori

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
    <!-- [Page Specific JS] end -->
</body>

</html>