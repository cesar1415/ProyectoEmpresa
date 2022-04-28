@extends('layouts.login')
@section('content')
    <form class="pt-3" action="{{ route('password.update') }}" method="post">
        @csrf

        <div class="form-group invisible">
            <div class="input-group ">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                    </span>
                </div>
                <input id="token" type="hidden" name="token" class="form-control form-control-lg border-left-0  is-invalid "
                    placeholder="token" value="{{ $token }}" required>
            </div>
        </div>
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

        <div class="form-group ">
            <label for="password">{{ __('Contraseña') }}</label>
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-lock text-primary"></i>
                    </span>
                </div>
                <input id="password" type="password" name="password"
                    class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="password"
                    placeholder="Contraseña " required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group ">
            <label for="password-confirm">{{ __('Confirme contraseña') }}</label>
            <div class="input-group ">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-lock text-primary"></i>
                    </span>
                </div>
                <input id="password-confirm" type="password" class="form-control form-control-lg border-left-0"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña ">
            </div>

        </div>

        <div class="my-3">
            <button class="btn btn-block btn-primary btn-lg  font-weight-medium auth-form-btn"
                type="submit">Guardar</button>
        </div>



    </form>
@endsection
