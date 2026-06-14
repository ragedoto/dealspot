<h1>Listings</h1>

<a href="{{ route('listings.create') }}">
    Create Listing
</a>

<hr>

@if($listings->isEmpty())

    <p>No listings found.</p>

@else

    @foreach($listings as $listing)

        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">

            <h3>
                <a href="{{ route('listings.show', $listing->id) }}">
                    {{ $listing->title }}
                </a>
            </h3>

            <p>{{ $listing->description }}</p>

            <p>
                Price: {{ $listing->price }}
            </p>

            <p>
                Category:
                {{ $listing->category->name }}
            </p>

            <p>
                Seller:
                {{ $listing->user->name }}
            </p>

        </div>

    @endforeach

@endif