@extends('layouts.login')
@section('content')
    <form class="pt-3" action="{{ url('/forgot_password') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                    </span>
                </div>
                <input id="email" type="email" name="email"
                    class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror"
                    placeholder="Correo o usuario" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row justify-content-md-between  align-items-center mb-0">
            <div class="col-12 col-md-6">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enviar Link') }}
                </button>
            </div>

            <div class="col-12 col-md-6">
                <a href="{{ route('login') }}" class="auth-link text-black" type="submit">Volver</a>
            </div>
        </div>



    </form>
@endsection
