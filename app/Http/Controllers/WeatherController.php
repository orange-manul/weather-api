<?php

namespace App\Http\Controllers;

use App\Service\Api\WeatherService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
    protected WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showForm(): View
    {
        return view('weather.form');
    }

    public function getWeather(Request $request, $city = null)
    {
        if ($request->isMethod('post')){
            $city = $request->input('city');
        }
        try {
            $weather = $this->weatherService->getWeather($city);
            return view('weather.result', compact('weather'));
        } catch (\Exception $e){
            return view('weather.result')->withErrors(['error' => $e->getMessage()]);
        }
    }
}
