@extends('layouts.admin')
@section('title', 'Gestión de productos')

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="card-title">Productos</h4>



                            <a href="{{ route('products.create') }}" class="btn btn-success text-light"> Agregar</a>


                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Estado</th>
                                        <th>Categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <a
                                                    href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            @if ($product->status == 'ACTIVE')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.products', $product) }}"
                                                        title="Editar">
                                                        activo<i class="ml-2 small fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.products', $product) }}"
                                                        title="Editar">
                                                        desactivado<i class="ml-2 small fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif

                                            <td>{{ $product->category->name }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE']) !!}

                                                <a class="jsgrid-button jsgrid-edit-button unstyled-button"
                                                    href="{{ route('products.edit', $product) }}" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                    type="submit" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
