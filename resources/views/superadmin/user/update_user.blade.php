    @extends('superadmin.main')

    @section('title', 'Form Elements')
    @section('breadcrumb-item', 'Form')
    @section('breadcrumb-item-active', 'Perbarui Data User')

    @section('css')
    @endsection

    @section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Perbarui Data</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('user_edit', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Nama User</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $detail_user->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pilih User</label>
                                    <br>
                                    <select class="btn btn-light-secondary" name="role" required>
                                        <option>Select Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == $data->roles->first()->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    @endsection
