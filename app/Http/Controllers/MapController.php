<?php

namespace App\Http\Controllers;

use App\Services\MapService;

class MapController extends Controller
{
    public $mapService;

    public function __construct(MapService $mapService)
    {
        $this->mapService = $mapService;
    }

    function index()
    {
        return view('map')->with('lands', $this->mapService->getAll());
    }
}
