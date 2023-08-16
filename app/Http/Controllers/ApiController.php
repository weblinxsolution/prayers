<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\countries;
use App\Models\cities;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function countries()
    {
        $countries = countries::all();

        $data = compact('countries');

        return response($data, 200)->header('Content-type', 'application/json');
    }

    public function region_countries($id)
    {
        $countries = countries::where('region_id', $id)->get();
    
        $data = compact('countries');

        return response($data, 200)->header('Content-type', 'application/json');
    }

    public function country_cities($id)
    {

        $cities = cities::where('country_id', $id)->get();

        $data = compact('cities');

        return response($data, 200)->header('Content-type', 'application/json');

    }

    public function cities()
    {
        $cities = cities::all();
        
        $data = compact('cities');

        return response($data, 200)->header('Content-type', 'application/json');
    }

    public function articles()
    {
        $articles = articles::all();

        $data = compact('articles');

        return response($data, 200)->header('Content-type', 'application/json');
    }
}
