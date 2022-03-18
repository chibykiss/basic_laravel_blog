@extends('layouts.app')
@section('content')


  @include('incs.carousel')



  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <!-- <h2>Featured Posts</h2> -->
    <!-- Three columns of text below the carousel -->
    {{-- <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div>
    </div> --}}


    <!-- START THE FEATURETTES -->

    <!-- <hr class="featurette-divider"> -->




    <div class="album py-5 bg-light">
      <!-- <h2>Blog Posts</h2> -->
      <div class="container">
         
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @if (count($posts) > 0)
            @foreach ($posts as $post)
              <div class="col d-flex align-items-stretch">
                <div class="card shadow-sm">
                  {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                  <img width="100%" height="225" src="/storage/post_images/{{$post->post_pic}}" alt=""/>
                  <div class="card-body d-flex flex-column">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">{!!Str::limit($post->content, 100)!!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                    
                      <a href="/single/{{$post->id}}" class="btn btn-primary">Read more</a>
                      <div class="d-flex flex-column">
                        <small class="text-muted">{{$post->created_at}}</small>
                        <small class="text-muted">{{$post->category}}</small>
                      </div>
                    
                    </div>
                    
                  </div>
                </div>
              </div>
            @endforeach
            @else
            <h2>No Posts yet</h2>
          @endif
 
        
  
        
        </div>
      </div>
      
      <nav style="margin-right: 10px;" aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
        {!! $posts->links() !!}
        {{-- <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul> --}}
      </nav>
    </div>
   
    <!-- /END THE POSTS -->

  </div><!-- /.container -->
@endsection



