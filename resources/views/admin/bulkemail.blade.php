@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Email Subscribers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
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
                <div class="row">
                    <div class="col-md-6 col-sm-6 mx-auto">
                        <div class="card mb-4 mt-3">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Send Email
                            </div>
                            <div class="card-body">
                                @include('admin.inc.messages')
                                <form action="{{route('admin.sendbulk')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Subject</label>
                                      <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}"/>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2 mb-3">
                                        <label for="exampleFormControlTextarea3">Content</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="7"></textarea>
                                    </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                                        @enderror
                                   
                                  
                                    <button type="submit" class="btn btn-primary">Send Email</button>
                                  </form>
                            </div>
                        </div>
                    </div>
              
                </div>
          
            </div>
        </main>
    @endsection