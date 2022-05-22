<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    @page {
        margin: 0cm 0cm;
        font-family: sans-serif;

    }

    body {
        margin: 3cm 2cm 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #392C70;
        color: white;
        text-align: center;
        line-height: 30px;
        font-size: 24px;
        padding-top: 15px;
        margin: 0;
    }

    header p {
        font-size: 12px;
    }

    section ul {
        list-style: none;
        font-size: 24px;
        font-weight: 'bold';
        font-family: sans-serif;
    }

    section ul li {
        list-style: none;
        font-size: 14px;
        margin-bottom: 5px;
        line-height: 15px;
        font-family: sans-serif;
        margin-top: 5px;

    }

    section ul li p {
        font-size: 16px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .check {
        width: 100%;
    }

    .check thead tr {
        height: 40px;
        border: 1px solid #000 !important;
    }

    .check thead tr th {

        padding: 5px;
        text-align: left;

    }

    .check tbody tr {
        border: 1px solid #555;
    }

    .check tbody tr td {
        border: 1px solid #000 !important;
        font-size: 14px;
        padding: 5px;
    }

    .check tfoot tr td {

        font-size: 14px;
        padding: 5px;
    }

    .text-right {
        text-align: right;
    }


    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #392C70;
        color: white;
        text-align: center;
        line-height: 35px;
    }


    /* Print Styles */
    @media print {

        body>*:not(.print) {
            display: none;
        }

        /* 	Remove the header and footer text and urls the browser places  */
        @page {
            margin: 0;
        }

    }

</style>

<body>
    <header>
        REPORTE DE VENTAS
        <p>Número #{{ $sale->id }}</p>
    </header>
    <section>
        DATOS DEL VENDEDOR
        <ul>
            <li>
                <p>Nombre:</p> {{ $sale->user->name }}

            </li>
            <li>
                <p>
                    Email: </p>{{ $sale->user->email }}
            </li>

        </ul>
    </section>

    <br>
    <br>
    <section>
        <div>
            <table class="check">
                <thead>
                    <tr>
                        <th colspan="2">Cantidad</th>
                        <th colspan="1">Producto</th>
                        <th colspan="1">Precio venta</th>
                        <th colspan="1">Descuento(%)</th>
                        <th colspan="1">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td colspan="2">{{ $saleDetail->quantity }}</td>
                            <td colspan="1">{{ $saleDetail->product->name }}</td>
                            <td colspan="1">$ {{ $saleDetail->price }}</td>
                            <td colspan="1">{{ $saleDetail->discount }}</td>
                            <td colspan="1">$
                                {{ number_format($saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100, 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p align="left">Subtotal:</p>
                            <p align="left">Total impuesto ({{ $sale->tax }}%):</p>
                            <p align="left">Pago total ({{ $sale->tax }}%):</p>
                        </th>
                        <td>
                            <p align="right">$ {{ number_format($subtotal, 2) }}</p>
                            <p align="right">$ {{ number_format(($subtotal * $sale->tax) / 100, 2) }}</p>
                            <p align="right">$ {{ number_format($sale->total, 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <div>
            Copyright &copy;
            2020
            Todos los derechos reservados
        </div>
    </footer>
</body>

</html>
