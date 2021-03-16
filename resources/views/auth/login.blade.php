@extends('layouts.app')

@section('content')

<div class="opacite">
    <div class="card-group">
      <div class="card" id="image">
        
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ __('Login') }}</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                   
                    
                </div>
                <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-2">

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div>
                    <h1> Se connecter avec Google </h1>
                    <p>
                        <!-- Lien de redirection vers Google -->
                        <a href="{{ route('socialite.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="btn btn-link"> Continuer avec Google </a>

                        <!-- Lien de redirection vers Google -->
                        <!-- <a href="{{ route('socialite.redirect', ['provider' => 'google', 'manager' => true]) }}" title="Connexion/Inscription avec Google" class="btn btn-link"> Continuer en tant que commerçant avec Google </a> -->
                        <a href="{{ route('socialite.manager', 'google') }}" title="Connexion/Inscription avec Google" class="btn btn-link"> Continuer en tant que commerçant avec Google </a>
                    </p>
                </div>
            </form>
        </div>
      </div>
    </div>

</div>



@endsection
