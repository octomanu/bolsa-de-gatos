<html>
    <head>
        <meta charset="utf-8">
        <style>
            body{
                font-family: "Raleway", sans-serif;
            }
            .td{
                font-size: 14px;
                margin: 0;
                width: 30% !important;
                height: 115px;
                display: flex;
                align-items: center;
            }
            h4{
                width: 95%;
            }
            .col1{
                margin-left: 5%;
                margin-right: 5%;
            }
            .box{
                display: flex;
                flex-wrap: wrap;
            }
            @media print {
                @page { margin: 0;
                    size: auto; }
            }
        </style>
        <script>
            window.onload = function(){
               /* window.print();
                window.location = '/busqueda'*/
            }
        </script>
    </head>
    <body>
        <div style="width: 100%" class="box">
            <?php $i = 0 ?>
            @foreach($contacts as $contact)
                <div class="td col{{$i}}" align="center">
                    <h4>
                        {{ $contact['first_name'] . ' ' . $contact['last_name'] }}
                        <br>
                        @if( $contact['address'])
                            Direc: {{ $contact['address'] }}
                        @else
                            Direc: {{ $consortium['address'] }}
                        @endif
                        <br>
                        @if( $contact['postal_code'])
                            CP: {{ $contact['postal_code'] }}
                        @else
                            CP: {{ $consortium['postal_code'] }}
                        @endif

                    </h4>
                </div>
                <?php $i++ ?>
                <?php $i > 2 ? $i = 0 : false ?>
            @endforeach
        </div>
    </body>
</html>