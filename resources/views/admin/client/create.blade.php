@extends('layouts.admin')
@section('title', 'Registrar cliente')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Registro de clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de clientes</h4>
                        </div>
                        {!! Form::open(['route' => 'clients.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group @if ($errors->has('name')) has-danger @endif">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('name')) has-danger @endif">
                            <label for="dni">DNI</label>
                            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId"
                                value="{{ old('dni') }}">
                            @if ($errors->has('dni'))
                                <span class="error text-danger" for="input-dni">{{ $errors->first('dni') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input type="number" class="form-control" name="ruc" id="ruc" aria-describedby="helpId"
                                value="{{ old('ruc') }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Direccion</label>
                            <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId"
                                value="{{ old('address') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefono \ Celular</label>
                            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId"
                                value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId"
                                value="{{ old('email') }}">
                        </div>



                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                        {!! Form::close() !!}
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$clients->render()}}
            </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/data-table.js') !!}
@endsection
