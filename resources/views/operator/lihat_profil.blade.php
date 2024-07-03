@extends('operator.main')

@section('title', 'Advance Initialization')
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
    <div class="col-lg-5 col-xxl-3">
        
        <div class="card overflow-hidden">
            <div class="card-body position-relative">
                <div class="text-center mt-3">
                    <div class="chat-avatar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                            src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="User image">
                        <i class="chat-badge bg-success me-2 mb-2"></i>
                    </div>
                    <h5 class="mb-0">William Bond</h5>
                    <p class="text-muted text-sm">DM on <a href="#" class="link-primary">@williambond</a> 😍</p>
                    <ul class="list-inline mx-auto my-4">
                        <li class="list-inline-item">
                            <a href="#" class="avatar avatar-s text-white bg-dribbble">
                                <i class="ti ti-brand-dribbble f-24"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="avatar avatar-s text-white bg-amazon">
                                <i class="ti ti-brand-figma f-24"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="avatar avatar-s text-white bg-pinterest">
                                <i class="ti ti-brand-pinterest f-24"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="avatar avatar-s text-white bg-behance">
                                <i class="ti ti-brand-behance f-24"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="row g-3">
                        <div class="col-4">
                            <h5 class="mb-0">86</h5>
                            <small class="text-muted">Post</small>
                        </div>
                        <div class="col-4 border border-top-0 border-bottom-0">
                            <h5 class="mb-0">40</h5>
                            <small class="text-muted">Project</small>
                        </div>
                        <div class="col-4">
                            <h5 class="mb-0">4.5K</h5>
                            <small class="text-muted">Members</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav flex-column nav-pills list-group list-group-flush account-pills mb-0"
                id="user-set-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link list-group-item list-group-item-action active"
                    id="user-set-profile-tab" data-bs-toggle="pill"
                    href="#user-set-profile" role="tab"
                    aria-controls="user-set-profile"
                    aria-selected="true">
                    <span class="fw-500"><i
                            class="ph-duotone ph-user-circle m-r-10"></i>Profile
                        Overview</span>
                </a>
                <a class="nav-link list-group-item list-group-item-action"
                    id="user-set-information-tab" data-bs-toggle="pill"
                    href="#user-set-information" role="tab"
                    aria-controls="user-set-information"
                    aria-selected="false">
                    <span class="fw-500"><i
                            class="ph-duotone ph-clipboard-text m-r-10"></i>Personal
                        Information</span>
                </a>
                <a class="nav-link list-group-item list-group-item-action"
                    id="user-set-account-tab" data-bs-toggle="pill"
                    href="#user-set-account" role="tab"
                    aria-controls="user-set-account"
                    aria-selected="false">
                    <span class="fw-500"><i
                            class="ph-duotone ph-notebook m-r-10"></i>Account
                        Information</span>
                </a>
                <a class="nav-link list-group-item list-group-item-action"
                    id="user-set-password-tab" data-bs-toggle="pill"
                    href="#user-set-password" role="tab"
                    aria-controls="user-set-password"
                    aria-selected="false">
                    <span class="fw-500"><i
                            class="ph-duotone ph-key m-r-10"></i>Change
                        Password</span>
                </a>
                <a class="nav-link list-group-item list-group-item-action"
                    id="user-set-email-tab" data-bs-toggle="pill"
                    href="#user-set-email" role="tab"
                    aria-controls="user-set-email"
                    aria-selected="false">
                    <span class="fw-500"><i
                            class="ph-duotone ph-envelope-open m-r-10"></i>Email
                        Settings</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xxl-9">
        <div class="tab-content" id="user-set-tabContent">
            <div class="tab-pane fade show active" id="user-set-profile"
                role="tabpanel" aria-labelledby="user-set-profile-tab">
                <div class="card">
                    <div class="card-header">
                        <h5>About me</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">Hello, I’m Anshan Handgun Creative
                            Graphic Designer & User Experience Designer
                            based in Website, I create digital Products a
                            more Beautiful and usable place. Morbid accusant
                            ipsum. Nam nec tellus at.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Details</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Full
                                            Name</p>
                                        <p class="mb-0">Anshan
                                            Handgun</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Father
                                            Name</p>
                                        <p class="mb-0">Mr. Deepen
                                            Handgun</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Phone</p>
                                        <p class="mb-0">(+1-876) 8654 239
                                            581</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Country</p>
                                        <p class="mb-0">New York</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Email</p>
                                        <p class="mb-0">anshan.dh81@gmail.com</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1 text-muted">Zip
                                            Code</p>
                                        <p class="mb-0">956 754</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0 pb-0">
                                <p class="mb-1 text-muted">Address</p>
                                <p class="mb-0">Street 110-B Kalians Bag,
                                    Dewan, M.P. New York</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="user-set-information"
                role="tabpanel" aria-labelledby="user-set-information-tab">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control"
                                        value="Anshan">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control"
                                        value="Handgun">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" value="New York">
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Zip code</label>
                                <input type="text" class="form-control"value="956754">
                            </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control">Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience Designer based in Website, I create digital Products a more Beautiful and usable place. Morbid accusant ipsum. Nam nec tellus at.</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Experience</label>
                                    <select class="form-control">
                                    <option>Startup</option>
                                    <option>2 year</option>
                                    <option>3 year</option>
                                    <option selected>4 year</option>
                                    <option>5 year</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
                 
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->

@endsection
