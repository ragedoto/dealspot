<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $parentCategory->name }} — {{ $activeCategory->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    @if($siblingCategories->isNotEmpty())

                        <div class="flex flex-wrap gap-2 mb-6">

                            @foreach($siblingCategories as $child)

                                @if($child->id === $activeCategory->id)

                                    <span class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-xs font-semibold text-white uppercase tracking-widest">
                                        {{ $child->name }}
                                    </span>

                                @else

                                    <a
                                        href="{{ route('lots.show', $child) }}"
                                        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md text-xs font-semibold text-gray-700 uppercase tracking-widest hover:bg-gray-50"
                                    >
                                        {{ $child->name }}
                                    </a>

                                @endif

                            @endforeach

                        </div>

                    @endif

                    @auth

                        <div class="mb-6">

                            <a
                                href="{{ route('lots.create-listing', $activeCategory) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-xs font-semibold text-white uppercase tracking-widest hover:bg-gray-700"
                            >
                                Create Listing
                            </a>

                        </div>

                    @endauth

                    <h3 class="text-lg font-medium text-gray-900">
                        Listings
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Available offers in this category.
                    </p>

                    <div class="mt-6 space-y-4">

                        @forelse($listings as $listing)

                            <div class="border rounded-lg p-4">

                                <a
                                    href="{{ route('lots.listing.show', $listing) }}"
                                    class="font-semibold text-lg text-gray-900"
                                >
                                    {{ $listing->title }}
                                </a>

                                <p class="text-gray-600 mt-2">
                                    {{ $listing->description }}
                                </p>

                                <div class="mt-3">
                                    <strong>Seller:</strong>
                                    {{ $listing->user->name }}
                                </div>

                                <div>
                                    <strong>Price:</strong>
                                    {{ $listing->price }}
                                </div>

                            </div>

                        @empty

                            <p class="text-gray-500">
                                No listings found.
                            </p>

                        @endforelse

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>