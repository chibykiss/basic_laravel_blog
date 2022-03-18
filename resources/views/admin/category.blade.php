@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tables</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
                @include('admin.inc.messages')
                <div class="mt-4 d-flex justify-content-end">
                    <a href="category/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create Category</a>
                </div>
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
                        Category List
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                @if (count($categorys)>0)
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($categorys as $category)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{$category->category}}</td>
                                                    <td><a href="category/{{$category->id}}/edit" class="btn btn-secondary"><i class="far fa-edit"></i> Edit</a></td>
                                                    <td><form method="POST" action="{{route('category.destroy', ['category' => $category->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="checkDelete()" type="submit"  class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h2>No category has been created yet</h2>
                                @endif
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    @endsection