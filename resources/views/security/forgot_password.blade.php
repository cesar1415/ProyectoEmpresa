<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>

<body>



</body>

</html>

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
                    placeholder="email o username" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="my-3">
            <button class="btn btn-block btn-primary btn-lg  font-weight-medium auth-form-btn" type="submit">Enviar
                Link</button>
        </div>



    </form>
@endsection
