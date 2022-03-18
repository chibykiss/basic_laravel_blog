<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{config('app.name')}}</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
      
    </head>
    <body class="sb-nav-fixed">
        @include('admin.inc.navbar')
        <div id="layoutSidenav">
            @include('admin.inc.sidebar')
                <div id="layoutSidenav_content">
                    @yield('content')

                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; {{config('app.name')}} 2021</div>
                                <div>
                                    <a href="#">Privacy Policy</a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{asset('js/readers.js')}}"></script>
        <script src="{{asset('js/bootstrap-tagsinput.js')}}" ></script>
        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'editor1' );
    </script>
    </body>
</html>