<?php

namespace App\Http\Controllers;

use App\Contracts\TVDataProvider;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchRequest $request)
    {
        $query = $request->query('q');
        $safeQuery = trim(strip_tags($query));
        /**
         * @var TVDataProvider $showsProvider
         */
        $showsProvider = app()->make(TVDataProvider::class);
        $showsData = $showsProvider->search4Shows($safeQuery);
        dd($showsData);
        return response('test');
    }
}
