@extends('layouts.admin')
@section('title', 'Gestión de ventas')

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <h4 class="card-title">Ventas</h4>

                            <a href="{{ route('sales.create') }}" class="btn btn-success text-light"> Registrar</a>

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
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                            </th>
                                            <td>{{ $sale->sale_date }}</td>
                                            <td>{{ $sale->total }}</td>

                                            @if ($sale->status == 'VALID')
                                                <td>
                                                    <a class="jsgrid-button btn btn-success d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.sales', $sale) }}" title="Editar">
                                                        activo<i class="ml-2 fas fa-check"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="jsgrid-button btn btn-danger d-inline-flex aling-items-center p-2"
                                                        href="{{ route('change.status.sales', $sale) }}" title="Editar">
                                                        cancelado<i class="ml-2 small fas fa-times"></i>
                                                    </a>
                                                </td>
                                            @endif

                                            <td style="width: 50px;">



                                                <a href="{{ route('sales.pdf', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button unstyled-button"><i
                                                        class="far fa-file-pdf"></i></a>
                                                <a href="{{ route('sales.print', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button unstyled-button"><i
                                                        class="fas fa-print"></i></a>
                                                <a href="{{ route('sales.show', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button unstyled-button"><i
                                                        class="far fa-eye"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/data-table.js') !!}
@endsection
