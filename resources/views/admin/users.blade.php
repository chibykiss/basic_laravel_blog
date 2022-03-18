@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                @include('admin.inc.messages')
                {{-- <div class="mt-4 d-flex justify-content-end">
                    <a href="category/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create Category</a>
                </div> --}}
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
                        Users List
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                @if (count($users)>0)
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            {{-- <th scope="col">Verified</th> --}}
                                            <th scope="col">Created_At</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($users as $user)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td><form method="POST" action="{{route('admin.delete_user', ['user_id' => $user->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h2>No user has been created yet</h2>
                                @endif
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    @endsection