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
        <h2 class="text-center mb-4">ADD A NEW SAUCE</h2>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-6">
        <form action="{{ route('sauces.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom de la sauce</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Fabricant</label>
                <input type="text" id="manufacturer" name="manufacturer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="mainPepper" class="form-label">Principal ingrédient épicé</label>
                <input type="text" id="mainPepper" name="mainPepper" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="imageUrl" class="form-label">URL de l'image</label>
                <input type="text" id="imageUrl" name="imageUrl" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="heat" class="form-label">Chaleur (1-10)</label>
                <input type="number" id="heat" name="heat" class="form-control" min="1" max="10" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ajouter la sauce</button>
        </form>
    </div>
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
    .btn-primary {
        background-color: black;
        border-color: black;
    }
    .btn-primary:hover {
        background-color: #333;
        border-color: #333;
    }
</style>
@endpush