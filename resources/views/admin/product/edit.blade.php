@extends('layouts.admin')
@section('title', 'Editar producto')
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
                Edición de producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edición de producto</h4>
                        </div>

                        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}

                        <div class="form-group @if ($errors->has('name')) has-danger @endif">
                            <label for="name">Nombre</label>
                            <input type="text"
                                class="form-control @if ($errors->has('name')) form-control-danger @endif"
                                name="name" id="name" value="{{ $product->name }}" aria-describedby="helpId">
                            @if ($errors->has('name'))
                                <label class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
                            @endif
                        </div>

                        <div class="form-group  @if ($errors->has('sell_price')) has-danger @endif">
                            <label for="sell_price">Precio de venta</label>
                            <input type="number" value="{{ $product->sell_price }}"
                                class="form-control @if ($errors->has('sell_price')) form-control-danger @endif"
                                name="sell_price" id="sell_price" aria-describedby="helpId">
                            @foreach ($errors->get('sell_price') as $message)
                                <label class="error mt-2 text-danger" for="">{{ $message }} </label>
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $product)
                                    <option value="{{ $product->id }}" @if ($product->id == $product->provider_id) selected @endif>
                                        {{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="card-body">
                            <h4 class="card-title d-flex">Imagen de producto

                            </h4>
                            <input type="file" name="picture" id="picture" class="dropify" />
                            @if ($errors->has('picture'))
                                <label class="error mt-2 text-danger" for="">{{ $errors->first('picture') }}</label>
                            @endif
                        </div>


                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
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
    {{-- {!! Html::script('js/data-table.js') !!} --}}
    {!! Html::script('js/dropify.js') !!}
@endsection
