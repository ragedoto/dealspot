<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-medium text-gray-900">
                        Order History
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        All your marketplace transactions.
                    </p>

                    <div class="mt-6 space-y-4">

                        @foreach($orders as $order)

                            <div class="border rounded-lg p-4">

                                <a href="{{ route('orders.show', $order) }}"
                                   class="font-semibold text-lg text-gray-900">
                                    {{ $order->listing->title }}
                                </a>

                                <p class="mt-2">
                                    <strong>Buyer:</strong>
                                    {{ $order->buyer->name }}
                                </p>

                                <p>
                                    <strong>Seller:</strong>
                                    {{ $order->seller->name }}
                                </p>

                                <p>
                                    <strong>Price:</strong>
                                    {{ $order->price }}
                                </p>

                                <p>
                                    <strong>Status:</strong>
                                    {{ $order->status }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>