<?php

namespace App\Services;
use App\Models\Land;

class MapService {
    public function getAll() {
        return Land::getAll();
    }
}