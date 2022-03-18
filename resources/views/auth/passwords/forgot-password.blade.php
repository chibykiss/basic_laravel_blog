<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Forgot password</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  @include('incs.responses')
  <form action="{{route('password.request')}}" method="POST">
    @csrf
    <img class="mb-4" src="{{asset('assets/img/logo.png')}}" alt="" width="100" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com">
      @error('email')
          <span class="invalid-feedback is-invalid" role="alert">
              <strong>{{ $message }} </strong>
          </span>
      @enderror
      <label for="floatingInput">Email address</label>
    </div>


   
    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
    <small><a href="/register">Not Registered? Register</a></small>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>
</html>
