@extends('layouts.admin')
@section('title', 'Gestión de compras')

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Compras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="card-title">Compras</h4>


                            <a href="{{ route('purchases.create') }}" class="btn btn-success text-light">Registrar</a>


                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th style="width: 50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <th scope="row">
                                                <a
                                                    href="{{ route('purchases.show', $purchase) }}">{{ $purchase->id }}</a>
                                            </th>
                                            <td>{{ $purchase->purchase_date }}</td>
                                            <td>{{ $purchase->total }}</td>

                                            @if ($purchase->status == 'VALID')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.purchases', $purchase) }}"
                                                        title="Editar">
                                                        activo<i class="ml-2 small fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.purchases', $purchase) }}"
                                                        title="Editar">
                                                        cancelado<i class="ml-2 small fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif

                                            <td style="width: 50px;">

                                                {!! Form::open(['route' => ['purchases.destroy', $purchase], 'method' => 'DELETE']) !!}


                                                <a href="{{ route('purchases.pdf', $purchase) }}"
                                                    class="jsgrid-button jsgrid-edit-button unstyled-button"><i
                                                        class="far fa-file-pdf"></i></a>

                                                <a href="{{ route('purchases.show', $purchase) }}"
                                                    class="jsgrid-button jsgrid-edit-button unstyled-button"><i
                                                        class="far fa-eye"></i></a>

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
                    {{$purchases->render()}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/data-table.js') !!}
@endsection
