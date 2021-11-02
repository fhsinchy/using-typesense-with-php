<div class="card large">
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-4 no-padding">{{ $book['title'] }} ({{ $book['publication_year'] }}) ({{ $book['average_rating'] }})</p>
                <p>
                    <span class="title is-6">
                        <a href='#'>
                            @foreach ($book['authors'] as $author)
                                {{ $author }} @if (!$loop->last) {{ ',' }}@endif
                            @endforeach
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
