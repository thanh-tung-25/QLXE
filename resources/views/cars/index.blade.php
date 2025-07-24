<!DOCTYPE html>
<html>
<head>
    <title>Danh sách xe</title>
</head>
<body>
    <h1>Danh sách xe</h1>
    <ul>
        @foreach ($cars as $car)
            <li>{{ $car->name }} - {{ $car->brand }} - {{ $car->price }} VND</li>
        @endforeach
    </ul>
</body>
</html>
