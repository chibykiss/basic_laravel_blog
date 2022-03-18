@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-sm 6 mx-auto pt-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">This is the About Page</h5>
                    <p class="card-text">You are welcome to the about page of readers blog</p>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>

    </div>
    
@endsection
