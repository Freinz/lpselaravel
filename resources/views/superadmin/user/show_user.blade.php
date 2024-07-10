@extends('superadmin.main')

@section('title', 'List User')
@section('breadcrumb-item', 'Profile')
@section('breadcrumb-item-active', 'List User')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}">
@endsection

@section('content')
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card border-0 table-card user-profile-list">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th> <!-- Added action column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                        <div class="d-inline-block">
                                            <h6 class="m-b-0">{{ old('name', $user->detail_user ? $user->detail_user->name : '') }}</h6>
                                            <p class="m-b-0 text-primary"></p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                    {{ $role->name }}@if(!$loop->last), @endif
                                    @endforeach
                                </td>

                                <td>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item m-0">
                                            <a href="{{ url('user_read', $user->id) }}" class="avtar avtar-s btn btn-primary">
                                                <i class="ti ti-pencil f-18"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item m-0">
                                            <button class="btn btn-danger delete-button" data-id="{{ $user->id }}">
                                                <i class="ti ti-trash f-18"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
@endsection

@section('scripts')
<!-- [Page Specific JS] start -->
<script src="{{ URL::asset('build/js/plugins/simple-datatables.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
<script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 5
        });

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
                    window.location.href = "/user_delete/" + id;
                }
            }); 
        });

    });
    });
</script>
<!-- [Page Specific JS] end -->
@endsection