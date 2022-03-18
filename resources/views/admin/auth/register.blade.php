<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{config('app.name', 'readers_blog')}}</title>
        <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        @if (Session::get('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
                                        @if (Session::get('fail'))
                                            {{Session::get('fail')}}
                                        @endif
                                        <form action="{{route('admin.rsave')}}" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        {{-- <span class="text-danger">@error('name'){{$message}} @enderror</span> --}}
                                                        <input class="form-control @error('firstname') is-invalid @enderror" name="firstname" type="text" placeholder="Firstname" value="{{old('firstname')}}" />
                                                        @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <label for="inputFirstName">First name</label>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control @error('lastname') is-invalid @enderror" name="lastname" type="text" placeholder="lastname" value="{{old('lastname')}}" />
                                                            @error('lastname')
                                                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="name@example.com" value="{{old('email')}}" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                                    @enderror
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Create a password" />
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                                        @enderror
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="Confirm password" />
                                                            @error('password_confirmation')
                                                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                                            @enderror
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('admin.login')}}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="{{ asset('js/scripts.js')}}"></script>
    </body>
</html>
