<html>
    <head>
        <meta charset="utf-8">
        <script>
            window.onload = function(){
                window.print();
                window.location = '/consorcio/{{$consortium['id']}}'
            }
        </script>
    </head>
    <body>
    <table style="width:100%">
        @for($i = 1 ; $i <= 9 ; $i++)
            <tr>
                @for($j = 0 ; $j < 3 ; $j++)
                    <td align="center">
                        <h3>
                            {{ $consortium['fancy_name'] }}
                            <br>
                            Direc: {{ $consortium['address'] }}
                            <br>
                            CP: {{ $consortium['postal_code'] }}
                        </h3>
                    </td>
                @endfor
            </tr>
        @endfor
    </table>
    </body>
</html>