@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12 col-sm-6 mx-auto pt-4 h-50">
            <div class="col-12 col-sm-6 mx-auto">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                    <div class="card-body">
                        <p><i class="fa fa-solid fa-address-book"></i> {{$contact->address}}</p>
                        <p><i class="fa fa-solid fa-envelope"></i> {{$contact->email}}</p>
                        <p><i class="fa fa-solid fa-phone"></i> {{$contact->phone}}</p>
    
                    </div>
    
                </div>
            </div>
        </div>

    </div>
    
@endsection