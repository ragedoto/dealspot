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

<a href="{{ route('listings.index') }}">
    Back to listings
</a>