<h1>
    {{ $parentCategory->name }} {{ $activeCategory->name }}
</h1>

@if($siblingCategories->isNotEmpty())

    <div>
        @foreach($siblingCategories as $child)

            @if($child->id === $activeCategory->id)
                <strong>{{ $child->name }}</strong>
            @else
                <a href="{{ route('lots.show', $child) }}">
                    {{ $child->name }}
                </a>
            @endif

            @if(!$loop->last)
                <span> · </span>
            @endif

        @endforeach
    </div>

    <hr>

@endif

@if(auth()->check())

    <a href="{{ route('lots.create-listing', $activeCategory) }}">
        Create Listing
    </a>

    <hr>

@endif

<h2>Listings</h2>

@if($listings->isEmpty())

    <p>No listings found.</p>

@else

    @foreach($listings as $listing)

        <div style="border:1px solid #ccc; padding:15px; margin-bottom:15px;">

            <h3>
                <a href="{{ route('lots.listing.show', $listing) }}">
                    {{ $listing->title }}
                </a>
            </h3>

            <p>{{ $listing->description }}</p>

            <p>
                Price:
                {{ $listing->price }}
            </p>

            <p>
                Seller:
                {{ $listing->user->name }}
            </p>

        </div>

    @endforeach

@endif

<hr>

<a href="/">
    Back
</a>