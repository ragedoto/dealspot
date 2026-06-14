<h1>{{ $listing->title }}</h1>

<p>
    Category:

    @if($listing->category->parent)
        {{ $listing->category->parent->name }} → {{ $listing->category->name }}
    @else
        {{ $listing->category->name }}
    @endif
</p>

<p>
    Seller:
    {{ $listing->user->name }}
</p>

<p>
    Price:
    {{ $listing->price }}
</p>

<p>
    Status:
    {{ $listing->status }}
</p>

<hr>

<p>
    {{ $listing->description }}
</p>

@if(auth()->check() && auth()->id() !== $listing->user_id)

<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <input
        type="hidden"
        name="listing_id"
        value="{{ $listing->id }}"
    >

    <button type="submit">
        Buy
    </button>
</form>

<hr>

@endif

@if(
    auth()->check() &&
    auth()->id() === $listing->user_id
)

<form action="{{ route('lots.listing.destroy', $listing) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">
        Delete Listing
    </button>
</form>

<hr>

@endif

<a href="{{ route('lots.show', $listing->category_id) }}">
    Back to listings
</a>