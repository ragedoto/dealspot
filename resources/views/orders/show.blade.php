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

<h2>Messages</h2>

@foreach($messages as $message)

    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>{{ $message->sender->name }}:</strong>

        <p>{{ $message->message }}</p>
    </div>

@endforeach

<form action="{{ route('messages.store') }}" method="POST">
    @csrf

    <input
        type="hidden"
        name="order_id"
        value="{{ $order->id }}"
    >

    <textarea name="message" required></textarea>

    <br>

    <button type="submit">
        Send Message
    </button>
</form>

<hr>

<a href="{{ route('orders.index') }}">
    Back to orders
</a>