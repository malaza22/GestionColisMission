@extends('layouts.app')

@section('principale')
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{asset('font-assets/images/logo.png')}}" alt="Gcolis" width="70" height="40">
                        </a>
                    </div>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Adresse électronique</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">se connecter</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Tu n'as pas de compte?
                                <a href="{{ route('register') }}">Inscrivez-vous ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
