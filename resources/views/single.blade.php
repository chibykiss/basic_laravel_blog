@extends('layouts.app')
@section('content')

    <div style="height: 150px;" class="col-12 bg-secondary py-5">
        <h2 class="text-white text-center">Single Post</h2>
    </div>





    <hr class="featurette-divider">

    <div class="container">
        <div class="col-6 mx-auto">
            {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Post pic</text></svg> --}}
            <img width="100%" height="300" src="/storage/post_images/{{ $single_post->post_pic }}" alt="" />
            <div>
                <p class="text-center">- {{ $single_post->category }} -</p>
                <h3>{{ $single_post->title }}</h3>
                <div class="d-flex justify-content-between">
                    <p>By: {{ $single_post->admin->firstname . ' ' . $single_post->admin->lastname }}</p>
                    <small>{{ $single_post->created_at }}</small>
                </div>

            </div>
            <div>{!! $single_post->content !!}</div>

        </div>
        <hr class="featurette-divider">

        <div class="container">
            <h3>Related Posts</h3>
            @if (count($related) > 0)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($related as $relate)
                        <div class="col d-flex align-items-stretch">
                            <div class="card shadow-sm">
                                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                                <img src="/storage/post_images/{{ $relate->post_pic }}" width="100%" height="225"
                                    alt="post_image" />
                                <div class="card-body">
                                    <h4 class="card-title">{{ $relate->title }}</h4>
                                    <p class="card-text">{!! Str::limit($relate->content, 100) !!}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div> -->
                                        <a href="/single/{{ $relate->id }}" class="btn btn-primary">Read more</a>
                                        <div class="d-flex flex-column">
                                            <small class="text-muted">{{ $relate->created_at }}</small>
                                            <small class="text-muted">{{ $relate->category }}</small>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @else
                <h2>No Related Posts Found</h2>
            @endif

        </div>
        <hr class="featurette-divider">

    </div>


    <!-- <div class="album bg-light col-10 mx-auto"> -->

    <section style="background-color: #eee;">

        <div class="container my-5 py-5">

            <div class="row d-flex justify-content-center">
                <h3 class="text-center">Comments</h3>
                    @if (session('fail'))
                        <div class="alert alert-danger">
                            {{session('fail')}}
                        </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <div class="col-md-12 col-lg-10 col-xl-8">
                    
                    <div class="card">
                        @if (count($comments) > 0)
                            @foreach ($comments as $comment)
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                            <p class="text-muted small mb-0">
                                                {{$comment->created_at}}
                                            </p>
                                        </div>
                                       
                                    </div>

                                    <p class="mt-3 mb-2 pb-2">
                                       {{$comment->comment}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        @can('update-comment', $comment)
                                            <div class="btn-group">
                                                <a href="/single/{{request()->id}}/{{$comment->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                                     
                                                <a href="/single/{{request()->id}}/{{$comment->id}}/delete" onclick="checkDelete()" class="btn btn-sm btn-outline-secondary">Delete</a>
                                                
                                            </div>
                                        @endcan
                                       
                                        
                                        {{-- <small class="text-muted">27th Oct. 2017</small> --}}
                                    </div>
                            
                                </div>
                            @endforeach
                        @else
                            <h6 class="text-center">No Comments Yet.</h6>
                        @endif
                   

                        {{-- <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                          
                                <div>
                                    <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                                    <p class="text-muted small mb-0">
                                        Shared publicly - Jan 2020
                                    </p>
                                </div>
                            </div>

                            <p class="mt-3 mb-2 pb-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
                            </p>
                    
                        </div> --}}
                        
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                          
                            <form action="{{route('add_comment')}}" method="POST">
                             
                                @csrf
                                <div class="d-flex flex-start w-100">

                                    <div class="form-outline w-100">
                                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" rows="4"
                                            style="background: #fff;"></textarea>
                                            @error('comment')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                            @enderror
                                       <input type="hidden" value="{{$single_post->id}}" name="postid"/>
                                    </div>

                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <button type="submit" class="btn btn-primary btn-sm">Add comment</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </div> -->
@endsection
