<?php

namespace App\Http\Controllers;

use App\Contracts\TVDataProvider;
use App\Http\Requests\SearchRequest;
use App\Services\TVMazeProcessor;

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
        $showsNames = TVMazeProcessor::formatData($showsData);
        try {
            $needleShow = collect($showsNames)->firstOrFail(function ($item) use($query) {
                return strtolower($item) === strtolower($query);
            });
        } catch (\Exception $exception) {
            return response('Show not found', 404);
        }

        return response(json_encode([
            'data' => $needleShow
        ]));
    }
}
