@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Posts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Posts</li>
                </ol>
                {{-- @include('admin.inc.messages')
                <div class="mt-4 d-flex justify-content-end">
                    <a href="category/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create Posts</a>
                </div> --}}
                {{-- <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6 col-sm-6 mx-auto"> --}}
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Posts
                            </div>
                            <div class="card-body">
                                @include('admin.inc.messages')
                                <form action="{{route('post.update', ['post' => $post->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Title</label>
                                      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$post->title}}"/>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlTextarea3">Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="7">{{$post->content}}</textarea>
                                    </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                 
                                    <div class="form-group mt-2">
                                        <label for="exampleSelect">Select category</label>
                                        <select class="form-control" name="category">
                                            @foreach ($categorys as $category)
                                                <option value="{{$category->category}}">{{$category->category}}</option>
                                            @endforeach
                                          
                                         
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleInputEmail1">Tags</label>
                                        <input type="text" class="form-control" name="tags" value="{{$post->tags}}"/>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mt-2 mb-3">
                                                <label for="exampleInputEmail1">Upload Image</label>
                                                <input type="file" class="form-control" name="post_pic" aria-describedby="picHelp">
                                                <small id="emailHelp" class="form-text text-muted">make sure your image type is supported, not more than 2mb</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group mt-2 mb-3">
                                                <img src="/storage/post_images/{{$post->post_pic}}" width="50" height="60" alt="image"/>
                                            </div>
                                            
                                        </div>
                                    </div>
                                   
                                   
                                  
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                  </form>
                            </div>
                        </div>
                    {{-- </div>
              
                </div> --}}
          
            </div>
        </main>
    @endsection