<h1>Create Listing</h1>

<form method="POST" action="{{ route('listings.store') }}">
    @csrf

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

    <div>
        <label>Category</label>

        <select name="category_id">

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach

        </select>
    </div>

    <br>

    <button type="submit">
        Create Listing
    </button>
</form>