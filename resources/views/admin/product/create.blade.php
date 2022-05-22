@extends('layouts.admin')
@section('title', 'Registrar producto')
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
                Registro de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de productos</h4>
                        </div>
                        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group @if ($errors->has('name')) has-danger @endif">
                            <label for="name">Nombre</label>
                            <input type="text"
                                class="form-control @if ($errors->has('name')) form-control-danger @endif"
                                name="name" id="name" aria-describedby="helpId">
                            @if ($errors->has('name'))
                                <label class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
                            @endif
                        </div>

                        <div class="form-group  @if ($errors->has('sell_price')) has-danger @endif">
                            <label for="sell_price">Precio de venta</label>
                            <input type="number"
                                class="form-control @if ($errors->has('sell_price')) form-control-danger @endif"
                                name="sell_price" id="sell_price" aria-describedby="helpId"
                                value="{{ old('sell_price') }}">

                            @foreach ($errors->get('sell_price') as $message)
                                <label class="error mt-2 text-danger" for="">{{ $message }} </label>
                            @endforeach
                        </div>

                        <div class="form-group @if ($errors->has('category_id')) has-danger @endif">
                            <label for="category_id">Categoría</label>
                            <select class="form-control @if ($errors->has('category_id')) form-control-danger @endif"
                                name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <label class="error mt-2 text-danger" for="">{{ $errors->first('category_id') }}</label>
                            @endif
                        </div>

                        <div class="form-group @if ($errors->has('provider_id')) has-danger @endif">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control @if ($errors->has('provider_id')) form-control-danger @endif"
                                name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('provider_id'))
                                <label class="error mt-2 text-danger" for="">{{ $errors->first('provider_id') }}</label>
                            @endif
                        </div>

                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen de producto

                            </h4>
                            <input type="file" name="picture" id="picture" class="dropify" />
                            @if ($errors->has('picture'))
                                <label class="error mt-2 text-danger" for="">{{ $errors->first('picture') }}</label>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                        {!! Form::close() !!}
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$products->render()}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/data-table.js') !!}
@endsection
