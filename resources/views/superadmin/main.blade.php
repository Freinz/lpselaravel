<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | LPSE Provinsi Kalimantan Selatan</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta
  name="description"
  content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."
/>
<meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('image/lpselogo.png') }}" type="image/png">

    @yield('css')

    @include('superadmin.head-css')
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light" >
    @include('superadmin.loader')
    
    @can('store_role')
        @include('superadmin.sidebar')
        @include('superadmin.topbar')
    @endcan


    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            @if(View::hasSection('breadcrumb-item'))
                @include('layouts.breadcrumb')
            @endif
            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('superadmin.footer')
    @include('superadmin.customizer')

    @include('superadmin.footerjs')

    @include('sweetalert::alert')
    @yield('scripts')
    <!-- <script type="text/javascript">
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
</script> -->



  </body>
  <!-- [Body] end -->
</html>