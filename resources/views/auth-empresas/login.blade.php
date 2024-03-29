@extends('layouts.auth-empresas')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger border-left-danger" role="alert">
                    <ul class="pl-4 my-2">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('sistema.empresa.login') }}" class="user">
                    @csrf

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember">{{ __('Manter conectado') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <hr>
                </form>

                <hr>

                @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="small" href="{{ route('sistema.empresas.password.request') }}">
                        {{ __('Recuperar senha?') }}
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
