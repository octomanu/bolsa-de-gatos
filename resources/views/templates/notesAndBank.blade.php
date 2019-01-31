<html>
    <head>
        <meta charset="utf-8">
        <style>
            body{
                padding: 50px;
            }
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }
            h4{
                margin-bottom: 0px;
            }
            p{
                margin-top: 0;
            }
            .tabla{
                margin: 20px auto;
            }
            @media print {
                @page { margin: 0;
                    size: auto; }
            }
        </style>
        <script>
            window.onload = function(){
                window.print();
                window.location = '/mostrar-expensas/{{$data[2]}}'
            }
        </script>
    </head>
    <body>

        <h3>NOTAS: </h3>
        @foreach($data[0] as $note)
            <div>
                <h4>{{ $note['title'] }}</h4>
                <p>{{ $note['description'] }}</p>
            </div>
        @endforeach

        <h3>BANCOS: </h3>
        @foreach($data[1] as $ban)
            <div class="tabla">
                <table class="table-bordered table">
                    <tr>
                        <td><strong>TITULAR: </strong>{{$ban['bank_branch']}}</td>
                        <td><strong>BANCO: </strong>{{$ban['bank_name']}}</td>
                    </tr>
                    <tr>
                        <td><strong>CBU: </strong>{{$ban['cbu']}}</td>
                        <td><strong>SUCURSAL: </strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIAS: </strong>{{$ban['alias']}}</td>
                        <td><strong>CODIGO DE PAGO ELECTRONICO: </strong>{{$ban['electronic_payment_code']}}</td>
                    </tr>
                    <tr>
                        <td><strong>NRo. DE CUENTA: </strong>{{$ban['account_number']}}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="tabla">
                <table class="table-bordered table">
                    <tr>
                        <td><strong>TITULAR: </strong>{{$ban['bank_branch']}}</td>
                        <td><strong>BANCO: </strong>{{$ban['bank_name']}}</td>
                    </tr>
                    <tr>
                        <td><strong>CBU: </strong>{{$ban['cbu']}}</td>
                        <td><strong>SUCURSAL: </strong></td>
                    </tr>
                    <tr>
                        <td><strong>ALIAS: </strong>{{$ban['alias']}}</td>
                        <td><strong>CODIGO DE PAGO ELECTRONICO: </strong>{{$ban['electronic_payment_code']}}</td>
                    </tr>
                    <tr>
                        <td><strong>NRo. DE CUENTA: </strong>{{$ban['account_number']}}</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        @endforeach
    </body>
</html>