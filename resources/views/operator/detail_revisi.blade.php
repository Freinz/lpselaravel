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
                            @foreach ($tabelproduk as $tabelproduk)
                            @if ($tabelproduk->status == 'ditolak')
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $tabelproduk->form->nama }}</td>
                                <td>{{ $tabelproduk->kota->nama_kota }}</td>
                                <td>{{ $tabelproduk->kategori->nama_kategori }}</td>
                                <td>{{ $tabelproduk->subKategori->nama_subkategori }}</td>
                                <td>{{ $tabelproduk->nama_barang }}</td>
                                <td>{{ $tabelproduk->satuan }}</td>
                                <td>{{ $tabelproduk->merk }}</td>
                                <td>Rp. {{ number_format($tabelproduk->harga, 0, ',', '.') }}</td>
                                <td>{{ $tabelproduk->status }}</td>
                                <td>{{ $tabelproduk->form->keterangan }}</td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-light-primary">
                                            <a href="{{ url('revisi_read/'. $tabelproduk->id) }}">Update</a>
                                        </button>
                                        <button type="button" class="btn btn-light-danger delete-button" data-id="{{ $tabelproduk->id }}">Delete</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/revisi_update_status/{{ $tabelproduk->form_id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="ditunda">
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
                title: 'Apakah Anda Yakin?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Iya, Hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('revisi_delete') }}/" + id;
                }
            });
        });

        // Initialize DataTables
        var table = $('#basic-btn').DataTable({
            dom: 'frtip',
            buttons: ['excel', 'print']
        });

        // Populate Kategori dropdown
        var categories = [];
        table.rows().every(function() {
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

            table.rows().every(function() {
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
