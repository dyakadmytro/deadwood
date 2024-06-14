<?php

namespace App\Services;

use App\Contracts\TVDataProcessor;

class TVMazeProcessor implements TVDataProcessor
{
    public static function formatData(array $data): array
    {
        return collect($data)->pluck('show.name')->all();
    }

}
