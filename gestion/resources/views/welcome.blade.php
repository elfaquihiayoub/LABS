<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> hello world</h1>
    @php
        $x=10;
        $y=20;
        $z=$x + $y;
    @endphp

    <p>{{ $x}} + {{$y}} = {{$z}}</p>
    

</body>
</html>
