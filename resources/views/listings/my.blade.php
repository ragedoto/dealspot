<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Listings
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($listings->isEmpty())

                <div class="bg-white shadow sm:rounded-lg p-6">
                    You don't have any listings yet.
                </div>

            @else

                @foreach($listings as $listing)

                    <div class="bg-white shadow sm:rounded-lg p-6 mb-4">

                        <h3 class="text-lg font-bold">
                            <a href="{{ route('lots.listing.show', $listing) }}">
                                {{ $listing->title }}
                            </a>
                        </h3>

                        <p class="text-gray-600 mt-2">
                            {{ $listing->description }}
                        </p>

                        <p class="mt-3">
                            Category:
                            @if($listing->category->parent)
                                {{ $listing->category->parent->name }} → {{ $listing->category->name }}
                            @else
                                {{ $listing->category->name }}
                            @endif
                        </p>

                        <p class="font-semibold mt-1">
                            Price: {{ $listing->price }}
                        </p>

                    </div>

                @endforeach

            @endif

        </div>

    </div>

</x-app-layout>