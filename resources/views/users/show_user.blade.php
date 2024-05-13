@extends('managementdata.main')

@section('title', 'User List')
@section('breadcrumb-item', 'Profile')

@section('breadcrumb-item-active', 'User List')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/css/plugins/style.css') }}" >
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
                      <th>Name</th>

                      <th>Email</th>
                      <th>Role</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>NIP</th>
                      <th>No KTP</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>

                  

                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($inputuser as $inputuser)
                    <tr>
                      <td>
                        <div class="d-inline-block align-middle">
                          <img src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                          <div class="d-inline-block">
                            <h6 class="m-b-0">{{$inputuser->user_name}}</h6>
                            <p class="m-b-0 text-primary"></p>
                          </div>
                        </div>
                      </td>

                      <td>{{$inputuser->email}}</td>
                      <td>{{$inputuser->role->role_user}}</td>
                      <td>{{$inputuser->address_user}}</td>
                      <td>{{$inputuser->phone_user}}</td>
                      <td>{{$inputuser->nip}}</td>
                      <td>{{$inputuser->no_ktp}}</td>
                      <td>{{$inputuser->tempat_lahir}}</td>
                      <td>{{$inputuser->tanggal_lahir}}</td>

                  

                      <td>
                        <span class="badge bg-light-success">Active</span>
                        <div class="overlay-edit">
                          <ul class="list-inline mb-0">
                            <li class="list-inline-item m-0"><a href="{{url('user_read', $inputuser->id)}}" class="avtar avtar-s btn btn-primary"><i class="ti ti-pencil f-18"></i></a></li>
                            <li class="list-inline-item m-0"><a href="{{url('user_delete', $inputuser->id)}}" class="avtar avtar-s btn bg-white btn-link-danger"  class="avtar avtar-s btn bg-white btn-link-danger" onclick="confirmation(event)" ><i class="ti ti-trash f-18"></i></a></li>
                          </ul>
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


  
  <script type="text/javascript">
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);

          swal({
            title: "Anda yakin menghapus ini?",
            text: "Data yang dihapus akan permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })

          .then((willCancel) => {
            if (willCancel) {

              window.location.href = urlToRedirect;

            }
          });
          
        }
</script>

@endsection