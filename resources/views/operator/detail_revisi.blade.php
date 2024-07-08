@extends('operator.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Detail Revisi dari Admin')

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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirim Revisi</button>
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
                                </tr>
                            </thead>
                            <tbody>
                                @php $nomor = 1; @endphp
                                @foreach ($superadmin as $spadmin)
                                    @if ($spadmin->status == 'ditolak')
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $spadmin->form->nama }}</td>
                                            <td>{{ $spadmin->nama_kota }}</td>
                                            <td>{{ $spadmin->kategori }}</td>
                                            <td>{{ $spadmin->sub_kategori }}</td>
                                            <td>{{ $spadmin->nama_barang }}</td>
                                            <td>{{ $spadmin->satuan }}</td>
                                            <td>{{ $spadmin->merk }}</td>
                                            <td>{{ $spadmin->harga }}</td>
                                            <td>{{ $spadmin->status }}</td>
                                            <td>{{ $spadmin->form->keterangan }}</td>
                                            <td>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="button" class="btn btn-light-primary">
                                                        <a href="{{ url('revisi_read/'. $spadmin->id) }}">Update</a>
                                                    </button>
                                                    <button type="button" class="btn btn-light-danger delete-button" data-id="{{ $spadmin->id }}">Delete</button>
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
    <!-- Modal -->
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
                        @method('PUT')
                        <input type="hidden" name="status" value="ditunda">
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
    <!-- [ Main Content ] end -->
@endsection

@section('scripts')
    <!-- [Page Specific JS] start -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
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
        $('#basic-btn').DataTable({
            dom: 'frtip',
            buttons: ['excel', 'print']

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

        // Populate Kota dropdown
        var cities = [];
        table.rows().every(function(rowIdx, tableLoop, rowLoop) {
            var data = this.data();
            var city = data[0]; // Kota
            if (cities.indexOf(city) === -1) {
                cities.push(city);
            }
        });

        cities.forEach(function(city) {
        $('#kotaDropdown').append('<li><a class="dropdown-item" href="#" onclick="filterKota(\'' + city + '\')">' + city + '</a></li>');
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

        // Handle Kota filter
        window.filterKota = function(kota) {
            table.column(0).search(kota).draw();
            $('#filterKotaBtn').text(kota ? 'Kota: ' + kota : 'Filter Kota');
        };

        // Reset all filters
        window.resetFilters = function() {
            $('#filterKotaBtn').text('Filter Kota');
            $('#filterKategoriBtn').text('Filter Kategori');
            $('#filterSubKategoriBtn').text('Filter Sub-Kategori');

            table.columns().search('').draw();
        };

        });
    </script>
    <!-- [Page Specific JS] end -->
@endsection
