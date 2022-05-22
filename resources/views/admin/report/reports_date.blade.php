@extends('layouts.admin')
@section('title', 'Reporte por rango de fecha')

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Reporte por rango de fecha
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fecha</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'report.results', 'method' => 'POST']) !!}

                        <div class="row ">

                            <div class="col-12 col-md-3">
                                <span>Fecha inicial</span>
                                <div class="form-group">
                                    <input class="form-control" type="date" value="{{ old('fecha_ini') }}"
                                        name="fecha_ini" id="fecha_ini">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <span>Fecha final</span>
                                <div class="form-group">
                                    <input class="form-control" type="date" value="{{ old('fecha_fin') }}"
                                        name="fecha_fin" id="fecha_fin">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 text-center mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 text-center">
                                <span>Total de ingresos: <b> </b></span>
                                <div class="form-group">
                                    <strong>s/ {{ $total }}</strong>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}

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
    <script>
        window.onload = function() {
            var fecha = new Date();
            var mes = fecha.getMonth() + 1;
            var dia = fecha.getDate();
            var ano = fecha.getFullYear();
            if (dia < 10)
                dia = '0' + dia;
            if (mes < 10)
                mes = '0' + mes
            document.getElementById('fecha_fin').value = ano + "-" + mes + "-" + dia;
        }
    </script>

@endsection
