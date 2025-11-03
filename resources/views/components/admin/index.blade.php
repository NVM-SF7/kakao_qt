<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>
        @isset($title)
            {{ $title }} | QRkakao
        @else
            QRkakao
        @endisset
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href='{{ asset('/images/favicon.png') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'>
    @isset($style)
        {{ $style }}
    @endisset
    <style>
        <style>html,
        body {
            height: 100%;
            margin: 0;
        }

        #main-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-body {
            flex: 1;
        }

        .footer {
            background: #fff;
            text-align: center;
            padding: 15px 0;
            box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.05);
        }
    </style>

    </style>
</head>

<body>

    <!--*******************
        Notification start
    ********************-->
    @if (session('success') || session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('success'))
                    Swal.fire({
                        title: "Sukses!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "OK"
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        title: "Kesalahan!",
                        text: "{{ session('error') }}",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                        confirmButtonText: "OK"
                    });
                @endif
            });
        </script>
    @endif
    <!--*******************
        Notification End
    ********************-->
    <!--*******************



        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Navigation and Header start
        ***********************************-->
        <x-admin.navigation>
        </x-admin.navigation>
        <!--**********************************
            Navigation and Header end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-12 p-md-0">
                        @isset($title)
                            <div class="welcome-text">
                                <h2>Data {{ $title }}</h2>
                            </div>
                        @endisset
                    </div @isset($breadcrumbs) {{ $breadcrumbs }} @endisset </div>
                    <div class="col-sm-12">
                    </div>
                    {{ $slot }}
                </div>
            </div>
            <!--**********************************
            Content body end
        ***********************************-->


            <!--**********************************
            Footer start
        ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>© 2025 QRCocoa <a target="_blank" rel="noopener noreferrer">Kawasan Integrasi Kakao</a>.</p>
                </div>
            </div>
            <!--**********************************
            Footer end
        ***********************************-->

        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('js/quixnav-init.js') }}"></script>
        <script src="{{ asset('js/custom.min.js') }}"></script>
        <script src="{{ asset('assets/js/lib/sweetalert/sweetalert.min.js') }}""></script>
        @isset($scripts)
            {{ $scripts }}
        @endisset
        @stack('scripts')
</body>

</html>
