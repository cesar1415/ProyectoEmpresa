@extends('layouts.admin')
@section('title', 'Registrar proveedor')
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
                Registro de proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('providers.index') }}">Proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de proveedores</h4>
                        </div>
                        {!! Form::open(['route' => 'providers.store', 'method' => 'POST']) !!}

                        <div class="form-group @if ($errors->has('name')) has-danger @endif">
                            <label for="name">Nombre</label>
                            <input type="text"
                                class="form-control @if ($errors->has('name')) form-control-danger @endif"
                                name="name" id="name" aria-describedby="helpId">
                            @if ($errors->has('name'))
                                <label id="firstname-error" class="error mt-2 text-danger"
                                    for="firstname">{{ $errors->first('name') }}</label>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('email')) has-danger @endif">
                            <label for="email">Correo electrónico</label>
                            <input type="email"
                                class="form-control  @if ($errors->has('email')) form-control-danger @endif"
                                name="email" id="email" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com">
                            @if ($errors->has('email'))
                                <label class="error mt-2 text-danger">{{ $errors->first('email') }}</label>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('ruc_number')) has-danger @endif">
                            <label for="ruc_number">Número de RUC</label>
                            <input type="number"
                                class="form-control  @if ($errors->has('ruc_number')) form-control-danger @endif"
                                name="ruc_number" id="ruc_number" aria-describedby="helpId">
                            @if ($errors->has('ruc_number'))
                                <label class="error mt-2 text-danger">{{ $errors->first('ruc_number') }}</label>
                            @endif

                        </div>

                        <div class="form-group @if ($errors->has('address')) has-danger @endif">
                            <label for="address">Dirección</label>
                            <input type="text"
                                class="form-control  @if ($errors->has('address')) form-control-danger @endif"
                                name="address" id="address" aria-describedby="helpId">
                            @if ($errors->has('address'))
                                <label class="error mt-2 text-danger">{{ $errors->first('address') }}</label>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('phone')) has-danger @endif">
                            <label for="phone">Número de contacto</label>
                            <input type="number"
                                class="form-control  @if ($errors->has('phone')) form-control-danger @endif"
                                name="phone" id="phone" aria-describedby="helpId">
                            @if ($errors->has('phone'))
                                <label class="error mt-2 text-danger">{{ $errors->first('phone') }}</label>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('providers.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                        {!! Form::close() !!}
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$providers}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/data-table.js') !!}
@endsection
