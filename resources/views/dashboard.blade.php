<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p>{{ __("You're logged in!") }}</p>

                    <br>

                    <a href="{{ route('listings.index') }}">
                        Listings
                    </a>

                    <br><br>

                    <a href="{{ route('orders.index') }}">
                        Orders
                    </a>

                    <br><br>

                    <a href="{{ route('categories.index') }}">
                        Categories
                    </a>

                    @if(auth()->user()->role?->name === 'admin')
                        <br><br>

                        <a href="{{ route('admin.index') }}">
                            Admin Dashboard
                        </a>
                    @endif

                    @if(
                        auth()->user()->role?->name === 'moderator' ||
                        auth()->user()->role?->name === 'admin'
                    )
                        <br><br>

                        <a href="{{ route('moderator.index') }}">
                            Moderator Dashboard
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>