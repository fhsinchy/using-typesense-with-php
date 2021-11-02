<?php

namespace App\Http\Livewire;

use Typesense\Client;
use Livewire\Component;

class Books extends Component
{
    protected $client;
    protected $searchResults;

    public $query = '';
    public $queryBy = '';

    public function render()
    {
        return view('livewire.books', [
            'books' => $this->searchResults['hits'],
        ]);
    }

    public function mount(Client $client)
    {
        $this->client = $client;

        $this->search();
    }

    public function search()
    {
        $queryParams = [
            'q' => $this->query === '' ? '*' : $this->query,
            'query_by' => $this->queryBy === '' ? 'title' : $this->queryBy,
        ];

        $searchResults = $this->client->collections['books']->documents->search($queryParams);

        $this->searchResults = $searchResults;
    }
}
