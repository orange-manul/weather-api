<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather($city)
    {
        $client = new Client();
        $apiKey = env('OPENWEATHER_API_KEY');

        try {
            $response = $client->get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}");
            $data = json_decode($response->getBody(), true);

            return response()->json([
                'city' => $data['name'],
                'temperature' => $data['main']['temp'] - 273.15, // Kelvin to Celsius
                'weather' => $data['weather'][0]['description'],
                'time' => date('Y-m-d H:i:s', $data['dt']) // UNIX time to human-readable format
            ]);
        } catch (RequestException $e) {
            return response()->json(['error' => 'City not found or other error occurred'], 404);
        }
    }
}
