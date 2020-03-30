@extends('layouts.app')

@section('content')
<div class="vh-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 mt-5 pt-5">
                <h1 class="display-4 bold mt-5 pt-3 brand-title">Digi-Talent</h1>

                <div class="row">
                    <div class="col-sm-12 mb-3 mt-5">
                        <h5>Inicia sesión para guardar tu progreso</h5>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <a class="mt-2 btn btn-primary btn-lg" 
                        href="{{ route('user.login.facebook', 'facebook') }}">
                            <span class="p-3 brand-button font-weight-bold">Facebook</span>
                        </a>
                    </div>

                    {{-- <div class="col-sm-12 col-md-6">
                        <a class="mt-2 btn btn-outline-theme btn-lg" 
                        href="{{ route('user.login.facebook', 'facebook') }}">
                            <span class="p-3 brand-button font-weight-bold">Correo</span>
                        </a>
                    </div> --}}
                </div>

                {{-- <form method="POST" action="{{ route('login') }}" style="display: none;">
                    @csrf

                    <div class="form-group row mt-5">
                        <div class="col-sm-12 mt-5">
                            <p class="mb-3">{{ __('Correo electrónico') }}</p>
                            <input id="email" type="email" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <p class="mb-3">{{ __('Contraseña') }}</p>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <p class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recordar mis datos') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 text-right">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                            <button type="submit" class="mt-2 btn btn-primary btn-lg">
                                <span class="p-3 brand-button font-weight-bold">Ingresar</span>
                            </button>
                        </div>
                    </div>
                </form> --}}
            </div>
            <div class="col-sm-12 col-md-6 mt-0">
                <img class="home-bg" src="/assets/images/home-bg.svg" width="1000" style="margin-left: -100px; margin-right: 100px;">
            </div>          
        </div>
    </div>
</div>



@endsection


