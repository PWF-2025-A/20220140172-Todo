<select name="category_id" id="category_id" required>
    <option value="">-- Select Category --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->title }}
        </option>
    @endforeach
</select>
