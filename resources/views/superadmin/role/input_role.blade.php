@extends('superadmin.main')

@section('title', 'User Widgets')
@section('breadcrumb-item', 'Widget')

@section('breadcrumb-item-active', 'Tambahkan Role')

@section('css')
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <form action="{{url('role_add')}}" method="Post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label class="form-label" for="exampleInputEmail1">Tambahkan Role Baru</label>
                <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" placeholder="Tambahkan Role" value="{{ old('role') }}">
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mb-4" data-bs-dismiss="alert" aria-label="Close">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-sm-12">
  <div class="card border-0 table-card user-profile-list">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover " id="pc-dt-simple">
          <thead>
            <tr>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>
                <div class="d-flex flex-wrap gap-2">
                  <a href="{{url('role_read', $item->id)}}" class="btn btn-primary">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <button class="btn btn-danger delete-button" data-id="{{ $item->id }}">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    $('.delete-button').on('click', function(event) {
      event.preventDefault();
      var id = $(this).data('id');
      var urlToRedirect = "/role_delete/" + id;
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
          window.location.href = urlToRedirect;
        }
      });
    });
  });
</script>

@endsection
