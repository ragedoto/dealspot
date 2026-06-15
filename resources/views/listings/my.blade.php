<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Listings
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-medium text-gray-900">
                        Your Listings
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Manage all listings you have created.
                    </p>

                    <div class="mt-6 space-y-4">

                        @forelse($listings as $listing)

                            <div class="border rounded-lg p-4">

                                <a href="{{ route('lots.listing.show', $listing) }}"
                                   class="font-semibold text-lg text-gray-900">
                                    {{ $listing->title }}
                                </a>

                                <p class="text-gray-600 mt-2">
                                    {{ $listing->description }}
                                </p>

                                <p class="mt-2">
                                    <strong>Price:</strong>
                                    {{ $listing->price }}
                                </p>

                            </div>

                        @empty

                            <p class="text-gray-500">
                                You don't have any listings yet.
                            </p>

                        @endforelse

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>