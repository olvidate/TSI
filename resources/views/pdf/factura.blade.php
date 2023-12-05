<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>A simple, clean, and responsive HTML invoice template</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title h1 {
            font-size: 1.4rem;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <h1>Aragun LTDA</h1>
                        </td>

                        <td>
                            Factura #{{$factura->id}}<br />
                            Fecha emisión: {{$factura->fecha_emision}}<br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            R.U.N: {{$factura->cliente->rut_cliente}}<br/>
                            Dirección: {{$factura->cliente->direccion}}<br />
                            Teléfono: {{$factura->cliente->num_tlf}}<br />
                        </td>

                        <td>
                            Aragun LTDA.<br />
                            76.145.247-9<br />
                            contacto@aragun.cl
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Producto</td>

            <td>Precio</td>
        </tr>

        @foreach($detalles as $item)
            <tr class="item">
                <td>{{$item->producto->nombre}}</td>

                <td>${{number_format($item->precio, 0, ',', '.')}}</td>
            </tr>
        @endforeach

        <tr class="item">
            <td>Costo de envio</td>

            <td>${{number_format($factura->cotizacion->precio_envio, 0, ',', '.')}}</td>
        </tr>

        <tr class="item last">
            <td>IVA (19%)</td>

            <td>${{number_format($factura->monto_neto*0.19, 0, ',', '.')}}</td>
        </tr>

        <tr class="total">
            <td></td>

            <td>Total: ${{number_format($factura->monto_neto * 1.19, 0, ',', '.')}}</td>
        </tr>
    </table>
</div>
</body>
</html>
