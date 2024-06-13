<?php

namespace App\Contracts;

interface TVDataProvider
{
    public function search4Shows(string $query, array $embed): array;
}
