@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-4 d-flex">
            <a href="{{ route('sauces.index') }}" class="btn btn-dark me-2 {{ $currentRoute == 'sauces.index' ? 'text-decoration-underline' : '' }}">ALL SAUCES</a>
            <a href="{{ route('sauces.create') }}" class="btn btn-dark {{ $currentRoute == 'sauces.create' ? 'text-decoration-underline' : '' }}">ADD SAUCE</a>
        </div>
        <div class="col-4 text-center">
            <h1>HOT TAKES</h1>
            <p class="text-muted">THE WEB'S BEST HOT SAUCE REVIEWS</p>
        </div>
        <div class="col-4 text-end">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-secondary">LOGOUT</a>
        </div>
    </div><div class="row mb-4">
    <div class="col-12">
        <hr class="border-dark border-2">
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2 class="text-center mb-4">THE SAUCES</h2>
    </div>
</div>

<div class="row">
    @foreach($sauces as $sauce)
    <div class="col-3 text-center mb-4">
        <img src="{{ $sauce->imageUrl }}" alt="{{ $sauce->name }}" class="img-fluid mb-3" style="max-height: 300px;">
        <h4>{{ $sauce->name }}</h4>
        <p class="text-muted">Heat: {{ $sauce->heat }}/10</p>
        <div class="d-flex justify-content-center mb-2">
            <a href="{{ route('sauces.show', $sauce->id) }}" class="btn btn-sm btn-outline-secondary me-2">View</a>
            <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
            <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sauce ?')">Delete</button>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <form action="{{ route('sauces.like', $sauce) }}" method="POST" class="me-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-success">Like ({{ $sauce->likes }})</button>
            </form>
            <form action="{{ route('sauces.dislike', $sauce) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">Dislike ({{ $sauce->dislikes }})</button>
            </form>
        </div>
    </div>
    @endforeach
</div></div>
@endsection
@push('styles')
<style>
    body {
        background-color: #f4f4f4;
    }
    .btn-dark {
        background-color: black;
        color: white;
    }
</style>
@endpush