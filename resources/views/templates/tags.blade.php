<html>
    <head>
        <meta charset="utf-8">
        <style>
            body{
                font-family: "Raleway", sans-serif;
            }
        </style>
        <script>
            window.onload = function(){
                window.print();
                window.location = '/busqueda'
            }
        </script>
    </head>
    <body>
    <table style="width:100%">
        @for($i = 1 ; $i <= 9 ; $i++)
            <tr>
                @for($j = 0 ; $j < 3 ; $j++)
                    <td align="center">
                        <h4 width="80%" style="margin: 7% 9%;">
                            {{ $consortium['fancy_name'] }}
                            <br>
                            Direc: {{ $consortium['address'] }}
                            <br>
                            CP: {{ $consortium['postal_code'] }}
                        </h4>
                    </td>
                @endfor
            </tr>
        @endfor
    </table>
    </body>
</html>