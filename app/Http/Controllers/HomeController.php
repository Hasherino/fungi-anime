<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {
        $response = Http::get('https://kitsu.io/api/edge/trending/anime');
        $data = $response->json()['data'];
        $anime = array_slice($data, 0, 4);

        return view('home', compact('anime'));
    }
}
