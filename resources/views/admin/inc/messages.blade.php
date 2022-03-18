@if (Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

@if (Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif