@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Posts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                </ol>
                @include('admin.inc.messages')
                <div class="mt-4 d-flex justify-content-end">
                    <a href="post/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create Posts</a>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                        .
                    </div>
                </div> --}}
                <div class="card mb-4 mt-3">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        All Posts
                    </div>
                    <div class="card-body">
                        @if (count($posts) > 0)
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Date added</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->content}}</td>
                                            <td>{{$post->admin->firstname}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td><a href="post/{{$post->id}}/edit">Edit</a></td>
                                            <td><form method="POST" action="{{route('post.destroy', ['post' => $post->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button  type="submit"> Delete</button>
                                            </form></td>
                                        </tr>
                                    @endforeach
                                
                                
                                </tbody>
                            </table>
                        @else
                            <h2> No posts found</h2>
                        @endif
                       
                    </div>
                </div>
            </div>
        </main>
    @endsection