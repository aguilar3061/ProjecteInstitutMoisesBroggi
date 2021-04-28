@if (Session::has("error"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get("error") }}
    </div>
@endif
@if (Session::has("mensaje"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get("mensaje") }}
    </div>
@endif
