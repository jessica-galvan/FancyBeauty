@extends('master')
@section('css')
    <?php $CSS = ['form','perfil']; ?>
@endsection
@section('content')
    <div class="register-form">
        <div class="">
            <div class="login-text">
                <h2>Olvidé mi contraseña</h2>
                <p>Ingresa tu email y te enviaremos un email con un link para poder cambiarla</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="error-form" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form">
                    <label for="password" class="">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="error-form" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div> --}}


                <div class="login-button">
                    <button type="submit">ENVIAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection
