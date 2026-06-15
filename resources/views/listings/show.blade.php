<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $listing->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-medium text-gray-900">
                        Listing Information
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        View listing details and create an order.
                    </p>

                    <div class="mt-6 space-y-4">

                        <div>
                            <span class="font-semibold">Category:</span>

                            @if($listing->category->parent)
                                {{ $listing->category->parent->name }} → {{ $listing->category->name }}
                            @else
                                {{ $listing->category->name }}
                            @endif
                        </div>

                        <div>
                            <span class="font-semibold">Seller:</span>
                            {{ $listing->user->name }}
                        </div>

                        <div>
                            <span class="font-semibold">Price:</span>
                            {{ $listing->price }}
                        </div>

                        <div>
                            <span class="font-semibold">Status:</span>
                            {{ $listing->status }}
                        </div>

                        <div>
                            <span class="font-semibold">Description:</span>
                            <p class="mt-2 text-gray-700">
                                {{ $listing->description }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-6 flex gap-3">

                        @if(auth()->check() && auth()->id() !== $listing->user_id)

                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf

                                <input
                                    type="hidden"
                                    name="listing_id"
                                    value="{{ $listing->id }}"
                                >

                                <x-primary-button>
                                    Buy
                                </x-primary-button>
                            </form>

                        @endif

                        @if(
                            auth()->check() &&
                            auth()->id() === $listing->user_id
                        )

                            <form action="{{ route('lots.listing.destroy', $listing) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500"
                                >
                                    Delete Listing
                                </button>
                            </form>

                        @endif

                        <a
                            href="{{ route('lots.show', $listing->category_id) }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50"
                        >
                            Back to listings
                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>