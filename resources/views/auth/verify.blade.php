@extends('master')
@section('css')
    <?php $CSS = ['form']; ?>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link de verificancion fue enviado a tu dirección de email.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor mire su email por un link de verificación.') }}
                    {{ __('Si usted no recibio un email de verificación') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
