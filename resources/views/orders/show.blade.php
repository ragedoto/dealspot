<h1>Order #{{ $order->id }}</h1>

<p>
    Listing:
    {{ $order->listing->title }}
</p>

<p>
    Buyer:
    {{ $order->buyer->name }}
</p>

<p>
    Seller:
    {{ $order->seller->name }}
</p>

<p>
    Price:
    {{ $order->price }}
</p>

<p>
    Status:
    {{ $order->status }}
</p>

@if(
    auth()->check() &&
    auth()->id() === $order->seller_id &&
    $order->status === 'pending'
)

<hr>

<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')

    <input
        type="hidden"
        name="status"
        value="completed"
    >

    <button type="submit">
        Complete Order
    </button>
</form>

<br>

<form action="{{ route('orders.update', $order) }}" method="POST">
    @csrf
    @method('PUT')

    <input
        type="hidden"
        name="status"
        value="cancelled"
    >

    <button type="submit">
        Cancel Order
    </button>
</form>

@endif

<hr>

<h2>Reviews</h2>

@foreach($reviews as $review)

    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <p>
            Rating:
            {{ $review->rating }}/5
        </p>

        <p>
            Comment:
            {{ $review->comment }}
        </p>

        <p>
            Reviewer:
            {{ $review->reviewer->name }}
        </p>
    </div>

@endforeach

@if(
    auth()->check() &&
    auth()->id() === $order->buyer_id &&
    $order->status === 'completed' &&
    $reviews->isEmpty()
)

<form action="{{ route('reviews.store') }}" method="POST">
    @csrf

    <input
        type="hidden"
        name="order_id"
        value="{{ $order->id }}"
    >

    <div>
        <label>Rating</label>

        <select name="rating" required>
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
        </select>
    </div>

    <br>

    <div>
        <label>Comment</label>

        <textarea name="comment"></textarea>
    </div>

    <br>

    <button type="submit">
        Leave Review
    </button>
</form>

@endif

<hr>

<a href="{{ route('orders.index') }}">
    Back to orders
</a>