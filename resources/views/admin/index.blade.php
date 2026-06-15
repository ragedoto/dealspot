<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-medium text-gray-900">
                        System Statistics
                    </h3>

                    <p class="mt-1 text-sm text-gray-600">
                        Overview of marketplace activity.
                    </p>

                    <div class="mt-6 space-y-4">

                        <div>
                            <span class="font-semibold">Users:</span>
                            {{ $usersCount }}
                        </div>

                        <div>
                            <span class="font-semibold">Listings:</span>
                            {{ $listingsCount }}
                        </div>

                        <div>
                            <span class="font-semibold">Orders:</span>
                            {{ $ordersCount }}
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>