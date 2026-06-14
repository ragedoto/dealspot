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

<a href="{{ route('orders.index') }}">
    Back to orders
</a>