<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        {{-- <a href="/" class="d-flex text-uppercase font-weight-bold align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          Readers
        </a> --}}
        <a href="{{url('/')}}"><img class="d-flex align-items-center mb-2 mb-lg-0 " src="{{asset('assets/img/logo.png')}}" alt="" width="100" height="57"></a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center ml-2 mb-md-0">
          <li><a href="/home" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
            @if (count($categorys))
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                @foreach ($categorys as $category)
                    <li><a class="dropdown-item" href="/category/{{$category->category}}">{{$category->category}}</a></li>
                @endforeach
              </ul>
            @endif
            
          </li>
          <li><a href="{{route('about')}}" class="nav-link px-2 text-white">About</a></li>
          <li><a href="/contact" class="nav-link px-2 text-white">Contact</a></li>
          <!-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
        </ul>

        <form action="{{route('search')}}" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" name="item" placeholder="Search..." aria-label="Search">
        </form>
      
    
        @guest
       
       
       
          @if (Route::has('login'))
          <div class="text-end">
            <a href="/login" class="btn btn-outline-light me-2">Login</a>
          @endif
          @if (Route::has('register'))
            <a href="/register" class="btn btn-warning">Sign-up</a>
          </div>
          @endif
          @else
     
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none text-white dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            {{-- <li><a class="dropdown-item" href="#">New project...</a></li> --}}
  
            <li><a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form></li>
          </ul>
        </div>
        @endguest
      </div>
    </div>
  </header>