<h1>{{ $listing->title }}</h1>

<p>
    Category:
    {{ $listing->category->name }}
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

<a href="{{ route('listings.index') }}">
    Back to listings
</a>