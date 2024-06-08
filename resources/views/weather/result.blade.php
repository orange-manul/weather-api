<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weather Forecast</title>
    <!-- Подключаем CSS Bootstrap через CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Подключаем стили Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container py-5 w-50">
    @if (isset($weather))
        <h1 class="mb-4">Weather in {{ $weather['city'] }}</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Temperature: {{ $weather['temperature'] }}°C</p>
                <p class="card-text">Weather: {{ $weather['weather'] }}</p>
                <p class="card-text">Last Updated: {{ $weather['time'] }}</p>
            </div>
        </div>
        <a href="/weather" class="btn btn-primary mt-3">Check another city</a>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong>Error:</strong> {{ $errors->first('error') }}
        </div>
    @endif
</div>
</body>
</html>
