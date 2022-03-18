@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Update Category</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Update category</li>
                </ol>
           
                {{-- <div class="card mt-4 mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div> --}}

                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Update category
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                 <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Category</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
           
                {{-- <div class="card mt-4 mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div> --}}

                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Blog Category
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('category.update',['category' => $category->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PUT">
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Edit Blog Category</label>
                                      <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{$category->category}}" aria-describedby="emailHelp">
                                      @error('category')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                      @enderror
                                      <div id="emailHelp" class="form-text">pls input your prefered blog category here.</div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <label for="exampleInputFile" class="form-label">Blog Category Pic</label>
                                                <input type="file" class="form-control @error('cat_pic') is-invalid @enderror" name="cat_pic" aria-describedby="emailHelp">
                                                @error('cat_pic')
                                                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                                @enderror
                                          </div>
                                          <div class="col-md-6">
                                            <label for="exampleInputFile" class="form-label">Old category Pic</label>
                                            <div class="card" style="width: 18rem;">
                                                <img src="/storage/cat_images/{{$category->cat_pic}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                  <p class="card-text">Old pic</p>
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                     
                                  
                                      
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    @endsection