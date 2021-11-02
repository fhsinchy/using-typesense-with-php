<div>
    <div class="container">
        <div class="section">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <div class="control">
                            <label class="label">Search Query</label>
                            <input class="input" type="text" placeholder="Search...">
                        </div>
                    </div>
                    <div class="field">
                        <div class="select mr-2">
                            <select v-model="query_by">
                            <option value="" selected disabled>Query By</option>
                            <option value="title">Title</option>
                            <option value="authors">Authors</option>
                            </select>
                        </div>
                        <div class="select ml-2">
                            <select v-model="sort_by">
                            <option value="" selected disabled>Sort By</option>
                            <option value="publication_year:desc">Year Descending</option>
                            <option value="publication_year:asc">Year Ascending</option>
                            <option value="average_rating:desc">Average Rating Descending</option>
                            <option value="average_rating:asc">Average Rating Ascending</option>
                            </select>
                        </div>
                        <div class="select ml-2">
                            <select v-model="per_page">
                            <option value="" selected disabled>Items Per Page</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row columns is-multiline">
            @foreach ($books as $book)
                <div class="column is-4">
                    @livewire('card', ['book' => $book['document']])
                </div>
                @endforeach
            </div>
            {{-- <div v-else class="notification is-primary">
                found nothing
            </div> --}}
        </div>
    </div>
</div>
