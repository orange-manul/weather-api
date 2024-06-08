<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
</head>
<body>
@if (isset($weather))
    <h1>Weather in {{ $weather['city'] }}</h1>
    <p>Temperature: {{ $weather['temperature'] }}°C</p>
    <p>Weather: {{ $weather['weather'] }}</p>
    <p>Last Updated: {{ $weather['time'] }}</p>
@endif

<a href="/weather">Check another city</a>

@if ($errors->any())
    <div>
        <strong>Error:</strong> {{ $errors->first('error') }}
    </div>
@endif
</body>
</html>
