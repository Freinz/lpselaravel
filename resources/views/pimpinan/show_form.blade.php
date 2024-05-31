@extends('pimpinan.main')

@section('title', 'User List')
@section('breadcrumb-item', 'Profile')

@section('breadcrumb-item-active', 'User List')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}" >
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card border-0 table-card user-profile-list">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover " id="pc-dt-simple">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Tanggal Survey</th>
                      <th>Periode</th>
                      <th>Status</th>
                      <th>Mengganti Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $form)
                    <tr>
                      <td>
                        <div class="d-inline-block align-middle">
                          <img src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                          <div class="d-inline-block">
                            <h6 class="m-b-0">{{$form->nama}}</h6>
                            <p class="m-b-0 text-primary"></p>
                          </div>
                        </div>
                      </td>

                      <td>{{$form->tgl_survey}}</td>
                      <td>{{$form->periode}}</td>
                      <td>{{$form->status}}</td>

                      <td>
                      <div class="d-flex flex-wrap gap-2">
                      
                              <button type="button" class="btn btn-light-primary"><a href="{{ url('setuju_form', $form->id) }}">Setuju</a></button>
                              <button type="button" class="btn btn-light-danger"><a href="{{ url('tidaksetuju_form', $form->id) }}">Tidak Setuju</a></button>
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
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->

@endsection

@section('scripts')
  <!-- [Page Specific JS] start -->
  <script src="{{ URL::asset('build/js/plugins/simple-datatables.js') }}"></script>
  <script>
    const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
      sortable: false,
      perPage: 5
    });
  </script>
  <!-- [Page Specific JS] end -->

  @endsection
