<?php

namespace App\Service\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WeatherService
{
    protected $client;
    protected $apiKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = env('OPENWEATHER_API_KEY');
    }

    public function getWeather($city)
    {
        try {
            $response = $this->client->get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$this->apiKey}");
            $data = json_decode($response->getBody(), true);

            return [
                'city' => $data['name'],
                'temperature' => $data['main']['temp'] - 273.15, // Kelvin to Celsius
                'weather' => $data['weather'][0]['description'],
                'time' => date('Y-m-d H:i:s', $data['dt']) // UNIX time to human-readable format
            ];
        } catch (RequestException $e) {
            throw new \Exception('City not found or other error occurred');
        }
    }
}

