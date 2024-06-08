<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
        }

        .custom-input {
            width: 300px; /* задаем желаемую ширину */
        }
    </style>
</head>
<body>
<div class="center">
    <div>
        <h1>Enter City Name</h1>
        <form action="/weather" method="POST">
            @csrf
            <label for="city" class="form-label">Enter city</label>
            <input type="text" class="form-control form-control-lg custom-input" id="city" name="city">
            <br>
            <button type="submit" class="btn btn-primary">Get Weather</button>
        </form>
    </div>
</div>
</body>
</html>
