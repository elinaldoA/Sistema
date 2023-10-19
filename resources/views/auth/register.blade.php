@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Registrar') }}</h1>
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

                <form method="POST" action="{{ route('sistema.admin.register') }}" class="user">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Sobrenome') }}" value="{{ old('last_name') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail') }}" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Senha') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirmar Senha') }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>

                <hr>

                <div class="text-center">
                    <a class="small" href="{{ route('sistema.admin.login') }}">
                        {{ __('Já possui conta? Login!') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
