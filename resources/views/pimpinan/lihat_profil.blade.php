@extends('pimpinan.main')

@section('title')
@section('breadcrumb-item', 'DataTable')
@section('breadcrumb-item-active', 'Profil Data')

@section('css')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/datepicker-bs5.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
<!-- [Page specific CSS] end -->
@endsection

@section('content')
<div class="row mt-3">
    <div class="col-lg-7 col-xxl-9">
        <div class="tab-content" id="user-set-tabContent">
            <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Pribadi</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Nama Lengkap</p>
                                <p class="mb-0">{{ $detail_user->name }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Email</p>
                                <p class="mb-0">{{ $detail_user->email }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Alamat</p>
                                <p class="mb-0">{{ $detail_user->alamat }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Nomor Telpon</p>
                                <p class="mb-0">{{ $detail_user->no_hp }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">NIP</p>
                                <p class="mb-0">{{ $detail_user->nip }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">NIK</p>
                                <p class="mb-0">{{ $detail_user->no_ktp }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Tempat Lahir</p>
                                <p class="mb-0">{{ $detail_user->tempat_lahir }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <p class="mb-1 text-muted">Tanggal Lahir</p>
                                <p class="mb-0">{{ $detail_user->tanggal_lahir }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Data</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('kirim_edit_profil', ['id' => $detail_user->id]) }}">
                            @csrf
                            @method('PUT') <!-- Metode PUT untuk update data -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $detail_user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $detail_user->alamat) }}">
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Nomor HP</label>
                                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp', $detail_user->no_hp) }}">
                                        @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">NIP</label>
                                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip', $detail_user->nip) }}">
                                        @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Nomor KTP</label>
                                        <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp', $detail_user->no_ktp) }}">
                                        @error('no_ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir', $detail_user->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir', $detail_user->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 col-xxl-3">
        <div class="card overflow-hidden">
            <div class="card-body position-relative">
                <div class="text-center mt-3">
                    <div class="chat-avatar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail" src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="User image">
                        <i class="chat-badge bg-success me-2 mb-2"></i>
                    </div>
                    <h5 class="mb-0">{{ $detail_user -> name }}</h5>
                    <p class="text-muted text-sm">Email <a href="#" class="link-primary">{{ $detail_user -> email }}</a></p>

                    <div class="row g-3">

                    </div>
                </div>
            </div>
        </div>

        <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0" id="user-set-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link list-group-item list-group-item-action active" id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile" role="tab" aria-controls="user-set-profile" aria-selected="true">
                <span class="fw-500"><i class="ph-duotone ph-user-circle m-r-10"></i>User Profil</span>
            </a>
            <a class="nav-link list-group-item list-group-item-action" id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information" role="tab" aria-controls="user-set-information" aria-selected="false">
                <span class="fw-500"><i class="ph-duotone ph-clipboard-text m-r-10"></i>Edit Data</span>
            </a>
        </div>
    </div>
</div>
@endsection