@extends('layouts.admin')
@section('title', 'Gestión de clientes')
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="card-title">Clientes</h4>


                            <a href="{{ route('clients.create') }}" class="btn btn-success text-light">Agregar</a>

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>DNI</th>
                                        <th>Telefono / Celular</th>
                                        <th>Correo electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <th scope="row">{{ $client->id }}</th>
                                            <td>
                                                <a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a>
                                            </td>
                                            <td>{{ $client->dni }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'DELETE']) !!}

                                                <a class="jsgrid-button jsgrid-edit-button unstyled-button"
                                                    href="{{ route('clients.edit', $client) }}" title="Editar">
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
