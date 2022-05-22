@extends('layouts.admin')
@section('title', 'Registro de venta')
@section('styles')
    {!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Registro de venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {!! Form::open(['route' => 'sales.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de venta</h4>
                        </div>

                        @include('admin.sale._form')


                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{ route('sales.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/alerts.js') !!}
    {!! Html::script('js/avgrund.js') !!}

    <script>
        $(document).ready(function() {
            $("#agregar").click(function() {
                agregar();
            });
        });
        var cont = 1;
        total = 0;
        subtotal = [];
        $("#guardar").hide();
        $("#product_id").change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_');
            $("#price").val(datosProducto[2]);
            $("#stock").val(datosProducto[1]);
        }

        function agregar() {
            datosProducto = document.getElementById('product_id').value.split('_');
            product_id = datosProducto[0];
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            discount = $("#discount").val();
            price = $("#price").val();
            stock = $("#stock").val();
            impuesto = $("#tax").val();
            if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
                if (parseInt(stock) >= parseInt(quantity)) {
                    subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" id="fila' + cont +
                        '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
                        ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' +
                        product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' +
                        parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(
                            price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' +
                        parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(
                            discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity +
                        '"> <input type="number" value="' + quantity +
                        '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(
                            2) + '</td></tr>';
                    cont++;
                    limpiar();
                    totales();
                    evaluar();
                    $('#detalles').append(fila);
                } else {
                    Swal.fire({
                        type: 'error',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            } else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de la venta.',
                })
            }
        }

        function limpiar() {
            $("#quantity").val("");
            $("#discount").val("0");
        }

        function totales() {
            $("#total").html("COP " + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("COP " + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("COP " + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuesto = total * impuesto / 100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("COP" + total);
            $("#total_impuesto").html("COP" + total_impuesto);
            $("#total_pagar_html").html("COP" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

@endsection
