<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:40px;">

                @foreach($categories as $category)

                    <div>

                        <h3>
                            @if($category->children->isNotEmpty())
                                <a href="{{ route('lots.show', $category->children->first()) }}">
                                    {{ $category->name }}
                                </a>
                            @else
                                {{ $category->name }}
                            @endif
                        </h3>

                        @foreach($category->children as $child)

                            <a href="{{ route('lots.show', $child) }}">
                                {{ $child->name }}
                            </a>

                            @if(!$loop->last)
                                <span> · </span>
                            @endif

                        @endforeach

                    </div>

                @endforeach

            </div>

        </div>
    </div>
</x-app-layout>