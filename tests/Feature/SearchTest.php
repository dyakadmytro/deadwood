<?php

test('Search response success', function () {
    $param = 'deadwood';
    $query = http_build_query(['q' => $param]);
    $response = $this->get(route('search', $query));

    $response->assertStatus(200);
    $response->assertJson([
        'data' => 'Deadwood'
    ]);
});
