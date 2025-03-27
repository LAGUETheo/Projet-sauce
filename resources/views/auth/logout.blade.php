@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2 class="mb-0">HOT TAKES</h2>
                    <p class="text-muted">THE WEB'S BEST HOT SAUCE REVIEWS</p>
                </div>
                <div class="card-body text-center">
                    <h3>You have been logged out</h3>
                    <p class="text-muted mb-4">We hope to see you again soon!</p><div class="d-flex justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block">LOGIN AGAIN</a>
                </div>
                
                <div class="mt-3">
                    <a href="{{ route('register') }}" class="text-primary">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
</div></div>
<style>
    body {
        background-color: #f4f4f4;
    }
    .card-header h2 {
        color: #333;
        font-weight: bold;
    }
    .card-header p {
        font-size: 0.8rem;
    }
    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endsection