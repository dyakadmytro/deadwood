<?php

namespace App\Services;

use App\Contracts\TVDataProvider;
use GuzzleHttp\Client;

class TVmaze implements TVDataProvider
{
    protected Client $client;
    public function __construct(Client $client){
        $this->client = $client;
    }

    public function search4Shows(string $query, array $embed = []): array
    {
        $params = [];
        $params['q'] = $query;
        if(!empty($embed)) $params['embed'] = $embed;

        $response = $this->client->get('/search/shows', [
            'query' => $params
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }


}
