<h1>Orders</h1>

@foreach($orders as $order)

<div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">

    <h3>{{ $order->listing->title }}</h3>

    <p>Buyer: {{ $order->buyer->name }}</p>

    <p>Seller: {{ $order->seller->name }}</p>

    <p>Price: {{ $order->price }}</p>

    <p>Status: {{ $order->status }}</p>

</div>

@endforeach