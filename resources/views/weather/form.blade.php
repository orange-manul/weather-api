<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
</head>
<body>
<h1>Enter City Name</h1>
<form action="/weather" method="POST">
    @csrf
    <label for="city">City:</label>
    <input type="text" id="city" name="city">
    <button type="submit">Get Weather</button>
</form>
</body>
</html>
