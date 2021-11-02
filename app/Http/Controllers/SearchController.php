<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Typesense\Client;

class SearchController extends Controller
{
    public function __invoke(Request $request, Client $client)
    {
        $q = '';
        $queryBy = '';

        if ($request->has('q') && trim($request->q) !== '') {
            $q = trim($request->q);
        } else {
            $q = '*';
        }

        if ($request->has('query_by') && trim($request->query_by) !== '') {
            $queryBy = trim($request->query_by);
        } else {
            $queryBy = 'title';
        }

        $queryParams = [
            'q' => $q,
            'query_by' => $queryBy,
        ];

        $searchResults = $client->collections['books']->documents->search($queryParams);

        $books = $searchResults['hits'];

        $request->flash();

        return view('books', compact('books'));
    }
}
