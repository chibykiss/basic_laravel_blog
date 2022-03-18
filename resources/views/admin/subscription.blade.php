@extends('admin.layouts.app')
    @section('content')
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Subscription</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{route('admin.dash')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Subscription</li>
                </ol>
                @include('admin.inc.messages')
                <div class="mt-4 d-flex justify-content-end">
                    <a href="subscription/bulkemail" class="btn btn-primary"><i class="fa fa-envelope"></i> Email all subscribers</a>
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
                        Subscribers List
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            
                                @if (count($subscribers)>0)
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped table-sm table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Registered user?</th>
                                            {{-- <th scope="col">Verified</th> --}}
                                            <th scope="col">Subscription date</th>
                                            <th scope="col">send Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($subscribers as $subscriber)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{$subscriber->email}}</td>
                                                    @if ($subscriber->user_id == null)
                                                        <td>{{_('No')}}</td>
                                                    @else
                                                        <td>{{_('Yes')}}</td>
                                                    @endif
                                                    
                                                    <td>{{$subscriber->created_at}}</td>
                                                    <td><a href="subscription/singlemail/{{$subscriber->email}}">send email</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h2>No subscription yet</h2>
                                @endif
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    @endsection