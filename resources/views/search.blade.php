@extends('layouts.app')
@section('content')
    <div class="album py-5 bg-light">
        @if (count($posts) > 0)
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach ($posts as $post)
                        <div class="col d-flex align-items-stretch">
                            <div class="card shadow-sm">
                                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                                <img width="100%" height="225" src="/storage/post_images/{{ $post->post_pic }}"
                                    alt="" />
                                <div class="card-body">
                                    <h4 class="card-title">{{ $post->title }}</h4>
                                    <p class="card-text">{!! Str::limit($post->content, 100) !!}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                          </div> -->
                                        <a href="/single/{{$post->id}}" class="btn btn-primary">Read more</a>
                                        <div class="d-flex flex-column">
                                            <small class="text-muted">{{ $post->created_at }}</small>
                                            <small class="text-muted">{{ $post->category }}</small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



            </div>
            <nav style="margin-right: 10%;" aria-label="Page navigation example" class="mt-3 d-flex justify-content-end">
              {!!$posts->links() !!}  
              {{-- <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> --}}
            </nav>
        @else
            <h1 class="text-center">No Results Found</h1>
        @endif
    </div>
@endsection
