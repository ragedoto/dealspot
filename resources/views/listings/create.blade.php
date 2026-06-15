<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Listing
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6">

                    <form method="POST" action="{{ route('lots.store') }}">
                        @csrf

                        <input type="hidden"
                               name="category_id"
                               value="{{ $category->id }}">

                        <div class="mb-4">
                            <label class="block mb-2">Title</label>

                            <input
                                type="text"
                                name="title"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2">Description</label>

                            <textarea
                                name="description"
                                rows="6"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                            ></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2">Price</label>

                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <x-primary-button>
                            Create Listing
                        </x-primary-button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>