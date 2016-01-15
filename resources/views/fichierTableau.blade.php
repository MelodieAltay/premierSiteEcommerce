<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body { height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            /*font-weight: 100;*/
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Fichier tableau</div>

        {{-- Commentaire en blade --}}
        <p>{{dump($products)}}</p>

        <p><ul>
            @foreach ($products as $prod)
                <li>Titre : {{ $prod['title'] }}</li>
                <li>Description : {{ $prod['description'] }}</li>
                <li>Prix : {{ $prod['prix'] }}</li>
                <li>Date :  {{ $prod['date_created']->format('d m Y') }}</li>
            @endforeach
        </ul></p>
    </div>
</div>
</body>
</html>