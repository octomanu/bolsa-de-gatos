<html>
    <head>
        <meta charset="utf-8">
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: "Raleway", sans-serif;
                font-size: .95em;
            }
            table{
                width: 70%;
                border-collapse: collapse;
                border: 3px solid #000000;
                margin: auto;
                margin-top: 20px;
            }
            tr, td, th{
                border: 2px solid black;
            }
            td{
                text-align: center;
                margin: 0;
            }
            .header img{
                height: 70px;
            }
            .data{
                height: 20px;
            }
            .data td:first-child{
                text-align: left;
                padding-left: 5px;
            }
            .titulo{
                height: 40px;
            }
            .tipos{
                height: 35px;
                font-size: 12px;
            }
            .tipos td{
                width: 20%;
            }
            .detalle td, .detalle th{
                padding-left: 5px;
                text-align: left;
                height: 30px;
            }
            .detalle.todos{
                height: 420px;
            }
            .todos td{
                padding-top: 10px;
                vertical-align: top;
                border: none;

            }
            .footer td{
                text-align: left;
                padding-left: 5px;
                height: 35px;
            }
            .firma{
                height: 70px;
                vertical-align: top;
                padding-top: 5px;
            }
            @media print {
                @page { margin: 0;
                    size: auto; }
            }

        </style>
        <script>
            window.onload = function(){
                window.print();
                window.location = '/administraciones'
            }
        </script>
    </head>
    <body>
    <table>
        <tr class="header">
            <td colspan="2">
                <img src="{{ url('img/logo_octopus.png') }}" alt="">
            </td>
            <th colspan="3">
                REMITO DE ENTREGA DOCUMENTACION
            </th>
        </tr>
        <tr class="data">
            <td colspan="2">
                ID Administración:
            </td>
            <td colspan="3">
                {{ $data['id_administracion'] }}
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
                Nombre Administración:
            </td>
            <td colspan="3">
                {{ $data['name'] }}
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
                Domicilio:
            </td>
            <td colspan="3">
                {{ $data['address'] }}
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
                Persona Contacto:
            </td>
            <td colspan="3">
                {{ $data['responsible'] }}
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
                Teléfonos de contacto:
            </td>
            <td colspan="3">
                {{ $data['phone'] }}
            </td>
        </tr>
        <tr class="titulo">
            <th colspan="5">
                TIPOS DE ENTREGA
            </th>
        </tr>
        <tr class="tipos">
            @if(in_array('salary', $data['typeDelivery']))
                <td>SUELDOS: X</td>
            @else
                <td>SUELDOS:</td>
            @endif
            @if(in_array('expenses', $data['typeDelivery']))
                <td>EXPENSAS: X</td>
            @else
                <td>EXPENSAS:</td>
            @endif
            @if(in_array('salaryExpenses', $data['typeDelivery']))
                <td>SUELDOS Y EXPENSAS: X</td>
            @else
                <td>SUELDOS Y EXPENSAS:</td>
            @endif
            @if(in_array('invoices', $data['typeDelivery']))
                <td>FACTURA: X</td>
            @else
                <td>FACTURA:</td>
            @endif
            @if(in_array('another', $data['typeDelivery']))
                <td>OTRO: X</td>
            @else
                <td>OTRO:</td>
            @endif
        </tr>
        <tr class="detalle">
            <td>Observaciones:</td>
            <th>Expensas:</th>
            <th>Sueldos</th>
            <th colspan="2">Cargas Sociales:</th>
        </tr>
        <tr class="detalle todos" >
            <td>

            </td>
            <td>
                <ul type="none">
                    @foreach($data['expenses'] as $expenses)
                        <li>{{ $expenses }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul type="none">
                    @foreach($data['salary'] as $salary)
                        @if($salary == 'all')
                            <li>Todos</li>
                            @break
                        @endif
                        <li>{{ $salary }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul type="none">
                    @if($data['social'])
                        <li>Todas</li>
                    @else
                        <li>No</li>
                    @endif
                </ul>

            </td>
            <td>

            </td>
        </tr>
        <tr class="footer">
            <td colspan="2"> Fecha de entrega de documentación: </td>
            <td colspan="3"> {{$data['date']}}</td>
        </tr>
        <tr class="footer">
            <td>Entregado por:</td>
            <td colspan="4">{{ $data['recieve'] }}</td>
        </tr>
        <tr class="footer firma">
            <td colspan="3">Recibido por:</td>
            <td colspan="2">Firma:</td>
        </tr>

    </table>
    </body>
</html>