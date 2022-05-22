<!DOCTYPE>
<html>
<meta charset="UTF-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reporte de compra</title>
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

    section table tbody section table tbody ul {
        list-style: none;
        font-size: 24px;
        font-weight: 'bold';
        font-family: sans-serif;
    }

    section table tbody ul li {
        list-style: none;
        font-size: 14px;
        margin-bottom: 5px;
        line-height: 15px;
        font-family: sans-serif;
        margin-top: 5px;

    }

    section table tbody ul li p {
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
        REPORTE DE COMPRA
        <p>Número #{{ $purchase->id }}</p>
    </header>
    <br>

    <section class="front">
        <table>
            <tbody>
                <tr>
                    <td>
                        DATOS DEL PROVEEDOR
                        <ul>
                            <li>
                                <p>Nombre: </p>{{ $purchase->provider->name }}

                            </li>
                            <li>
                                <p>
                                    Dirección: </p> {{ $purchase->provider->address }}

                            </li>
                            <li>
                                <p>
                                    Teléfono: </p> {{ $purchase->provider->phone }}

                            </li>
                            <li>
                                <p>
                                    Email: </p> {{ $purchase->provider->email }}
                            </li>
                        </ul>
                    </td>
                    <td>
                        DATOS DEL COMPRADOR
                        <ul>
                            <li>
                                <p>Nombre: </p>{{ $purchase->user->name }}

                            </li>
                            <li>
                                <p> Telefono: </p> ----

                            </li>
                            <li>
                                <p> Email: </p>{{ $purchase->user->email }}

                            </li>
                            <li>
                                <p> Fecha de compra: </p>{{ $purchase->created_at }}

                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

    <br>
    <section>
        <table class="check">
            <thead>
                <tr>
                    <th colspan="2">Cantidad</th>
                    <th colspan="1">Producto</th>
                    <th colspan="1" class="text-right">Precio Compra </th>
                    <th colspan="1" class="text-right">Subtotal </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseDetails as $purchaseDetail)
                    <tr>
                        <td colspan="2">{{ $purchaseDetail->quantity }}</td>
                        <td colspan="1">{{ $purchaseDetail->product->name }}</td>
                        <td colspan="1" class="text-right">${{ $purchaseDetail->price }}</td>
                        <td colspan="1" class="text-right">
                            ${{ number_format($purchaseDetail->quantity * $purchaseDetail->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">
                        <p align="left">Subtotal:</p>
                        <p align="left">Total impuesto ({{ $purchase->tax }}%):</p>
                        <p align="left">Pago total:</p>
                    </th>
                    <td>
                        <p align="left">${{ number_format($subtotal, 2) }}
                        </p>
                        <p align="left">${{ number_format(($subtotal * $purchase->tax) / 100, 2) }}</p>
                        <p align="left">${{ number_format($purchase->total, 2) }}
                        </p>
                    </td>
                </tr>
            </tfoot>
        </table>
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
