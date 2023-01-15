<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;

class Helpers
{
    public static function getCountries()
    {

        $response = Http::get('https://restcountries.com/v3.1/region/Americas');
        $countries = $response->json();

        $countriesList = [];
        foreach ($countries as $country) {
            array_push($countriesList, $country["name"]["common"]);
        }

        return $countriesList;
    }
}
