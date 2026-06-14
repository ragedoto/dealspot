<h1>Categories</h1>

<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 40px;">

    @foreach($categories as $category)

        <div>
            <h3>{{ $category->name }}</h3>

            @foreach($category->children as $child)

                <a href="#">
                    {{ $child->name }}
                </a>

                @if(!$loop->last)
                    <span> · </span>
                @endif

            @endforeach

        </div>

    @endforeach

</div>