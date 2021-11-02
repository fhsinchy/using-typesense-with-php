@extends('layouts.site')

@section('content')
<div>
    <div class="container">
        <div class="section">
            <div class="columns">
                <div class="column">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="field has-addons">
                            <div class="control">
                                <div class="select">
                                    <select name="query_by">
                                        <option value="" selected disabled>Query By</option>
                                        <option value="title" {{ (old("query_by") == "title" ? "selected" : "") }}>Title</option>
                                        <option value="authors" {{ (old("query_by") == "authors" ? "selected" : "") }}>Authors</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control is-expanded">
                              <input value="{{ old('q') }}" name="q" class="input" type="text" placeholder="Find a repository">
                            </div>
                            <div class="control">
                              <button class="button is-info" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($books) > 0)
            <div class="row columns is-multiline">
            @foreach ($books as $book)
            <div class="column is-4">
                <div class="card large">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-content">
                                <p class="title is-4 no-padding">{{ $book['document']['title'] }} ({{ $book['document']['publication_year'] }}) ({{ $book['document']['average_rating'] }})</p>
                                <p>
                                    <span class="title is-6">
                                        <a href='#'>
                                            @foreach ($book['document']['authors'] as $author)
                                                {{ $author }} @if (!$loop->last) {{ ',' }}@endif
                                            @endforeach
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @else
            <div class="notification is-primary">
                found nothing
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
