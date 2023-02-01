<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category_id" id="category">
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                @selected($cat->id==$post->category_id)
            >{{ $cat->title }}</option>
        @endforeach
    </select>
    @error('category_id')
    <p style="color: red"> {{$message}}</p>
    @enderror
</div>
