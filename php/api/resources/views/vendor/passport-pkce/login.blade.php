@extends('layout')
@section('content')
@if($errors->any())
<div class="w-100 alert alert-danger position-absolute">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<main
    class="container vh-100 d-flex col-xxl-3 col-xl-4 col-md-5 col-sm-8 col align-items-center justify-content-center">
    <div class="w-100 min-h-50 mx-auto p-2">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="w-50 d-flex flex-column align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50%" height="50%">
                    <defs>
                        <linearGradient id="logo-gradient" x1="100%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#efadce" />

                            <stop offset="100%" stop-color="#a6e9d5" />

                        </linearGradient>
                    </defs>
                    <mask id="smile">
                        <rect width="32" height="32" fill="white" />
                        <path fill="none" stroke-linecap="round" stroke-width="2" stroke="black"
                            d="M 6 19 C 8 30,24 30, 26 19" />
                    </mask>
                    <circle fill="url(#logo-gradient)" mask="url(#smile)" cx="16" cy="16" r="15" />
                </svg>
                <span class="mb-3 text-muted display-6">
                    Login
                </span>
            </div>
            <form class="w-100 mb-5" method="POST" action="/oauth/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-muted">Email address</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="name@example.com" />
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label text-muted">
                        Password
                    </label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="********" />
                </div>
                <div class="mb-4 d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <input id="remember" name="remember" type="checkbox" class="btn-check" />
                        <label for="remember" class="btn btn-sm btn-outline-secondary"
                            style="--bs-bg-opacity:0.5">Remember me</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="me-2 btn btn-lg btn-secondary w-50" type="submit">
                        Login
                    </button>
                    <button class="btn btn-lg btn-outline-secondary w-50" type="reset">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection