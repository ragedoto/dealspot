<h1>Create Listing</h1>

@if(isset($category))

    <p>
        Category:

        @if($category->parent)
            {{ $category->parent->name }} → {{ $category->name }}
        @else
            {{ $category->name }}
        @endif
    </p>

@endif

<form method="POST" action="{{ route('lots.store') }}">
    @csrf

    <input
        type="hidden"
        name="category_id"
        value="{{ $category->id }}"
    >

    <div>
        <label>Title</label>
        <input type="text" name="title">
    </div>

    <br>

    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <div>
        <label>Price</label>
        <input type="number" step="0.01" name="price">
    </div>

    <br>

    <button type="submit">
        Create Listing
    </button>
</form>