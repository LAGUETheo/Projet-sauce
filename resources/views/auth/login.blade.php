@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <div class="card mt-5">
                <div class="card-header text-center">
                    <h2 class="mb-0">HOT TAKES</h2>
                    <p class="text-muted">THE WEB'S BEST HOT SAUCE REVIEWS</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" required value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="sr-only">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4 w-100">CONNEXION</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="text-primary">S'INSCRIRE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection