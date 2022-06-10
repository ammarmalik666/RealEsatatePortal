<!doctype html>
<html lang="en" dir="ltr">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/images/brand/favicon.ico" />
    <title>Admin Portal</title>
    @include('admin.includes.css')   
</head>

    <body class="ltr app sidebar-mini light-mode">

        <!-- GLOBAL-LOADER -->
        <div id="global-loader">
            <img src="admin/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <div class="page">
            <div class="page-main">
                <!-- APP-HEADER -->
                @include('admin.includes.header')
                <!--APP-SIDEBAR-->
                @include('admin.includes.sidebar')
                <!--APP-CONTENT OPEN-->
                <div class="app-content main-content mt-0">
                    <div class="side-app">
                        <!-- CONTAINER -->
                        @yield('content')
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
            @include('admin.includes.footer')
        </div>
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
        @include('admin.includes.scripts')
    </body>
</html>


