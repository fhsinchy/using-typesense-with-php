<?php

return [
    'name' => 'books',
    'fields' => [
        ['name' => 'title', 'type' => 'string'],
        ['name' => 'authors', 'type' => 'string[]', 'facet' => true],
        ['name' => 'image_url', 'type' => 'string'],

        ['name' => 'publication_year', 'type' => 'int32', 'facet' => true],
        ['name' => 'ratings_count', 'type' => 'int32'],
        ['name' => 'average_rating', 'type' => 'float']
    ],
    'default_sorting_field' => 'ratings_count'
];
