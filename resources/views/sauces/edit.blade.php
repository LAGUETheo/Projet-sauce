@extends('layouts.app')

@section('content')
    <h1>Modifier la sauce</h1>

    <form action="{{ route('sauces.update', $sauce->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom de la sauce</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $sauce->name }}" required>
        </div>
        <div class="form-group">
            <label for="manufacturer">Fabricant</label>
            <input type="text" id="manufacturer" name="manufacturer" class="form-control" value="{{ $sauce->manufacturer }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ $sauce->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="mainPepper">Principal ingrédient épicé</label>
            <input type="text" id="mainPepper" name="mainPepper" class="form-control" value="{{ $sauce->mainPepper }}" required>
        </div>
        <div class="form-group">
            <label for="imageUrl">URL de l'image</label>
            <input type="text" id="imageUrl" name="imageUrl" class="form-control" value="{{ $sauce->imageUrl }}" required>
        </div>
        <div class="form-group">
            <label for="heat">Chaleur (1-10)</label>
            <input type="number" id="heat" name="heat" class="form-control" value="{{ $sauce->heat }}" min="1" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
