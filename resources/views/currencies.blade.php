<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Currencies</title>
    </head>
    <body>
        <h1>Currencies</h1>
        <ul>
            @foreach ($currencies as $currency)
            <li>{{ $currency->getName() }} - {{ $currency->getActualCourse() }}</li>
            @endforeach
        </ul>
    </body>
</html>
