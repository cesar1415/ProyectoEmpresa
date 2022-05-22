@extends('layouts.admin')
@section('title', 'Reporte de ventas')

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Reporte de ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte de ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">



                        <div class="row ">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha de consulta: <b> </b></span>
                                <div class="form-group">
                                    <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Cantidad de registros: <b></b></span>
                                <div class="form-group">
                                    <strong>{{ $sales->count() }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Total de ingresos: <b> </b></span>
                                <div class="form-group">
                                    <strong>s/ {{ $total }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th style="width:50px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                            </th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a') }}
                                            </td>
                                            <td>{{ $sale->total }}</td>
                                            <td>{{ $sale->status }}</td>
                                            <td style="width: 50px;">



                                                <a href="{{ route('sales.pdf', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button"><i
                                                        class="far fa-file-pdf"></i></a>
                                                <a href="{{ route('sales.print', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button"><i
                                                        class="fas fa-print"></i></a>
                                                <a href="{{ route('sales.show', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button"><i
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
