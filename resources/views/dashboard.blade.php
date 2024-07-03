<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') LPSE Kalimantan Selatan</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."/>
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('image/lpselogo.png') }}" type="image/png">

    @yield('css')
    <!-- [Page specific CSS] end -->

    @include('layouts.head-css')

    <!-- Custom CSS for DataTables Search Box -->
    <style>
        /* Mengatur font pada kotak pencarian */
        .dataTables_filter input {
            font-family: Arial, sans-serif;
            font-size: 14px;
            width: 200px; /* Ubah nilai ini sesuai kebutuhan */
        }
    </style>
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

            <form id="search-form" action="/" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <select id="nama_kota" name="nama_kota" class="form-select">
                            <option value="">Pilih Kota</option>
                            @foreach($nama_kota as $kota)
                                <option value="{{ $kota->nama_kota }}">{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="kategori" name="kategori" class="form-select">
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $kategori)
                                <option value="{{ $kategori->kategori }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="sub_kategori" name="sub_kategori" class="form-select">
                            <option value="">Pilih Sub Kategori</option>
                            @foreach($sub_kategori as $sub_kategori)
                                <option value="{{ $sub_kategori->sub_kategori }}">{{ $sub_kategori->sub_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
        
                </div>
            </form>

            <!-- Row Grouping table start -->
            <div class="row"> 
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
                                        @foreach ($superadmin as $spadmin)
                                            @if ($spadmin->status == 'diterima')
                                                <tr>
                                                    <td>{{ $spadmin->nama_kota }}</td>
                                                    <td>{{ $spadmin->kategori }}</td>
                                                    <td>{{ $spadmin->sub_kategori }}</td>
                                                    <td>{{ $spadmin->nama_barang }}</td>
                                                    <td>{{ $spadmin->satuan }}</td>
                                                    <td>{{ $spadmin->merk }}</td>
                                                    <td>{{ $spadmin->harga }}</td>
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var table = $('#basic-btn').DataTable({
                dom: 'frtip',
                language: {
                    search: "_INPUT_", // Mengganti default label 'Search' dengan ikon atau teks kustom
                    searchPlaceholder: "Masukkan barang yang ingin anda cari...",
                }
            });

            function filterTable() {
                // Ambil nilai dari dropdown
                var kota = $('#nama_kota').val();
                var kategori = $('#kategori').val();
                var subKategori = $('#sub_kategori').val();

                // Terapkan filter pada tabel
                table.columns(0).search(kota).columns(1).search(kategori).columns(2).search(subKategori).draw();
            }

            // Event listener untuk dropdown
            $('#nama_kota').on('change', function() {
                filterTable();
            });

            $('#kategori').on('change', function() {
                filterTable();
            });

            $('#sub_kategori').on('change', function() {
                filterTable();
            });

            // Mengubah gaya kotak pencarian dengan jQuery
            var tableWidth = $('.dataTables_wrapper').width();
            $('.dataTables_filter input')
                .val('') // Menetapkan nilai default ke string kosong
                .css({
                    'font-family': 'Arial, sans-serif',
                    'font-size': '20px',
                    'text-align': 'center',
                    'width': (tableWidth + 1) + 'px' // Ubah nilai ini sesuai kebutuhan
                });

            $('#search-form').on('submit', function(event) {
                var kota = $('#nama_kota').val();
                var kategori = $('#kategori').val();
                var subKategori = $('#sub_kategori').val();

                if (!kota && !kategori && !subKategori) {
                    event.preventDefault(); // Mencegah submit form
                    alert('Silakan pilih minimal salah satu dari Kota, Kategori, atau Sub Kategori.');
                }
            });
        });
    </script>
    <!-- [Page Specific JS] end -->
</body>

</html>
