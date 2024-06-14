<?php

namespace App\Contracts;

interface TVDataProcessor
{
    public static function formatData(array $data): array;
}
