@extends('layouts.auth-clientes')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Confirm Password') }}</h1>
                    <p>{{ __('Please confirm your password before continuing.') }}</p>
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

                @if (session('status'))
                <div class="alert alert-success border-left-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('sistema.clientes.password.confirm') }}" class="user">
                    @csrf

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Confirm Password') }}
                        </button>
                    </div>
                </form>

                <hr>

                @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="small" href="{{ route('sistema.clientes.password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
