<!--**********************************
    Icons start
    Icons used Themify: https://themify.me/themify-icons
***********************************-->
<link rel="stylesheet" href='{{ asset('icons/themify-icons/css/themify-icons.css') }}'>
<!--**********************************
    Icons end
***********************************-->

<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">


            <!--**********************************
                Main Menu Start
            ***********************************-->
            <!-- Label -->
            <x-admin.navigation.nav-component.nav-label-first>Main
                Menu</x-admin.navigation.nav-component.nav-label-first>
            <!-- Content -->
            <x-admin.navigation.nav-component.nav-link href="{{ route('dashboard') }}" icon="ti-layout-grid2">
                Dashboard
            </x-admin.navigation.nav-component.nav-link>

            <!--**********************************
               Main Menu End
            ***********************************-->



            <!--**********************************
               Detail Data Start
            ***********************************-->
            <!-- Label -->
            <x-admin.navigation.nav-component.nav-label>
                Master Data
            </x-admin.navigation.nav-component.nav-label>
            <!-- Content -->
            <x-admin.navigation.nav-component.nav-link href="{{route('petani.index')}}" icon="ti-user">
                Petani
            </x-admin.navigation.nav-component.nav-link>
            <x-admin.navigation.nav-component.nav-link href="{{route('klon.index')}}" icon="ti-layout-column2-alt">
                Klon
            </x-admin.navigation.nav-component.nav-link>
            <x-admin.navigation.nav-component.nav-link href="{{route('status.index')}}" icon="ti-stats-up">
                Status
            </x-admin.navigation.nav-component.nav-link>
            <!--**********************************
                Detail Data End
                ***********************************-->



                <!--**********************************
                    Data Perkebunan Start
                    ***********************************-->
                    <x-admin.navigation.nav-component.nav-label>
                        Perkebunan
                    </x-admin.navigation.nav-component.nav-label>
                    <x-admin.navigation.nav-component.nav-link href="{{route('kebun.index')}}" icon="ti-map">
                        Kebun
                    </x-admin.navigation.nav-component.nav-link>
                    <x-admin.navigation.nav-component.nav-link href="{{route('blok-jalur.index')}}" icon="ti-map">
                        Blok/Jalur
                    </x-admin.navigation.nav-component.nav-link>
                    <x-admin.navigation.nav-component.nav-link href="{{route('tanaman.index')}}" icon="ti-control-record">
                        Tanaman
                    </x-admin.navigation.nav-component.nav-link>
                    <x-admin.navigation.nav-component.nav-link href="{{route('taksasi.index')}}" icon="ti-pencil-alt">
                        Taksasi
                    </x-admin.navigation.nav-component.nav-link>
                    <x-admin.navigation.nav-component.nav-link href="{{route('tanaman.qr.select')}}" icon="ti-stats-up">
                        Print QR
                    </x-admin.navigation.nav-component.nav-link>
                    <!--**********************************
                        Data Perkebunan End
                        ***********************************-->



            <!--**********************************
               Dropdown Element start
            ***********************************-->
            {{-- <x-admin.navigation.nav-component.nav-label>
                Dropdown Element
            </x-admin.navigation.nav-component.nav-label>
            <x-admin.navigation.nav-component.nav-link-dropdown>
                <x-slot name="title">
                    Apps
                </x-slot>
                <x-admin.navigation.nav-component.nav-link-dropdown.nav-link href="/">Profiles</x-admin.navigation.nav-component.nav-link-dropdown.nav-link>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                    <ul aria-expanded="false">
                        <li><a href="./email-compose.html">Compose</a></li>
                        <li><a href="./email-inbox.html">Inbox</a></li>
                        <li><a href="./email-read.html">Read</a></li>
                    </ul>
                </li>
            </x-admin.navigation.nav-component.nav-link-dropdown> --}}
            <!--**********************************
               Dropdown Element end
            ***********************************-->


        </ul>
    </div>


</div>
