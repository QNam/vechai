<!DOCTYPE html>
<html lang="en">
<head>
    {{-- anvuidevteam_meobeodamdang --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QUản trị</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="{{ asset('libs/bootstrap-4.4.1/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}"> 
    <link rel="stylesheet" href="{{ asset('css/admin.custom.css') }}?v={{ time() }}"> 
    <script src="{{ asset('libs/jquery-3.4.1/jquery-3.4.1.min.js') }}"></script>
    
    <link rel="stylesheet" href="http://adminweb.anvui.vn/public/plugins/toastr/build/toastr.min.css">
</head>
<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            setTimeout(() => {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div>
        <div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed">
                            <a class="sidebar-link td-n" href="{{ route("admin.index") }}" class="td-n">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo"><img src="https://colorlib.com/polygon/adminator/assets/static/images/logo.png"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item active">
                        <a class="sidebar-link" href="{{ route("admin.index") }}" default>
                            <span class="icon-holder">
                                <i class="c-orange-500 ti-home"></i> </span><span class="title">trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder"><i class="c-orange-500 ti-file"></i> </span>
                            <span class="title">tin tức</span>
                            <span class="arrow"><i class="ti-angle-right"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="{{ route('admin.news.create',['id' => '']) }}">thêm tin tức</a></li>
                            <li><a class="sidebar-link" href="{{ route('admin.news.index') }}">danh sách tin tức</a></li>
                        </ul>
                    </li>
                    <li class="nav-item active">
                        <a class="sidebar-link" href="{{ route("admin.menu.index") }}" default>
                            <span class="icon-holder">
                                <i class="c-orange-500 ti-menu"></i> </span><span class="title">menu</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li>
                            <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a>
                        </li>

                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle d-flex align-content-center" data-toggle="dropdown">
                                <div class=""><img class=""
                                        style="height: 30px; width: 30px; display: inline-block; border-radius: 50%;"
                                        src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png"
                                        alt=""></div>
                                <div><span class="fsz-sm c-grey-900">{{ Auth::user()->username }}</span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                            <li><a href="{{ route('admin.logout') }}"
                                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                            class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">

                    @yield('content')

                </div>
            </main>
            <!-- <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>Copyright © 2017 Designed by <a href="https://colorlib.com" target="_blank"
                        title="Colorlib">Colorlib</a>. All rights reserved.</span>
            </footer> -->
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="http://adminweb.anvui.vn/public/plugins/toastr/build/toastr.min.js"></script>

    <script src="{{ asset('js/admin.vendor.js') }}?v={{ time() }}"></script>
    <script  src="{{ asset('libs/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin.custom.js') }}?v={{ time() }}"></script>

    <script>
        $(document).ready( function () {
            $('.avdatatable').DataTable();
        });
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    @if( session('GLOBAL_STATUS') != null )
        @if (session('GLOBAL_STATUS') == 'SUCCESS')
        <script>
            $(window).on('load', function(){
                toastr.success(`{{Session::get('GLOBAL_MSG') }}`)
            });
        </script>
        @endif

        @if (session('GLOBAL_STATUS') == 'ERROR')
        <script>
            $(window).on('load', function(){
                toastr.error('{{Session::get("GLOBAL_MSG") }}')
            })
        </script>
        @endif
    @endif
        
    @stack('scripts')
    {{-- <script>
        let moduleContentBuilder = new ModuleContentBuilder({
            wrap: '#js--moduleContent',
        });
    </script> --}}

<script>
    
</script>
</body>
</html>
