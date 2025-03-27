@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-4 d-flex">
            <a href="{{ route('sauces.index') }}" class="btn btn-dark me-2">ALL SAUCES</a>
            <a href="{{ route('sauces.create') }}" class="btn btn-dark">ADD SAUCE</a>
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
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $sauce->name }}</h2>
                <img src="{{ $sauce->imageUrl }}" class="img-fluid mb-3" alt="{{ $sauce->name }}">
                
                <p><strong>Fabricant:</strong> {{ $sauce->manufacturer }}</p>
                <p><strong>Description:</strong> {{ $sauce->description }}</p>
                <p><strong>Principal ingrédient épicé:</strong> {{ $sauce->mainPepper }}</p>
                <p><strong>Niveau de chaleur:</strong> {{ $sauce->heat }}/10</p>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('sauces.edit', $sauce->id) }}" class="btn btn-warning">Éditer</a>
                    
                    <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sauce ?')">Delete</button>
            </form>
                </div>
            </div>
        </div>
    </div>
</div></div>
@endsection
@push('scripts')
<script>
function confirmDelete() {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette sauce ?')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endpush
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