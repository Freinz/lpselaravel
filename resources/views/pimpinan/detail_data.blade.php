@extends('pimpinan.main')

@section('title', 'Advance Initialization')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Detail Data')

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

                <div class="table-responsive dt-responsive">
                    @role('pimpinan')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirim Respon</button>
                    @endrole
                    <table id="multi-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengirim</th>
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


                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1; @endphp
                            @foreach ($superadmin as $spadmin )
                            @if ($spadmin -> status == 'ditunda')
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $spadmin->form->nama }}</td>
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
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @role('pimpinan')
    <!-- Row Grouping table end -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Setujui Data</h1>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole
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
        var table = $('#multi-table').DataTable();

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

            table.column(2).search(kategori).draw();
            $('#filterKategoriBtn').text(kategori ? 'Kategori: ' + kategori : 'Filter Kategori');
        };

        // Handle Sub-Kategori filter
        window.filterSubKategori = function(subKategori) {
            table.column(3).search(subKategori).draw();
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