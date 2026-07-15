<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input type="text" id="author" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
    @error('author') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select id="category_id" name="category_id" class="form-select" required>
        <option value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea id="description" name="description" class="form-control" rows="3">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-6 mb-3">
        <label for="price" class="form-label">Price (R)</label>
        <input type="number" id="price" name="price" step="0.01" min="0" class="form-control" value="{{ old('price', $book->price ?? '') }}" required>
        @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
    <div class="col-6 mb-3">
        <label for="stock_quantity" class="form-label">Stock Quantity</label>
        <input type="number" id="stock_quantity" name="stock_quantity" min="0" class="form-control" value="{{ old('stock_quantity', $book->stock_quantity ?? '') }}" required>
        @error('stock_quantity') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label for="cover_image" class="form-label">Cover Image</label>
    @if (!empty($book) && $book->cover_image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current cover" style="width: 80px;">
        </div>
    @endif
    <input type="file" id="cover_image" name="cover_image" class="form-control" accept="image/*">
    <div class="form-text">JPG or PNG, max 2MB. Leave blank to keep the current image.</div>
    @error('cover_image') <div class="text-danger small">{{ $message }}</div> @enderror
</div>