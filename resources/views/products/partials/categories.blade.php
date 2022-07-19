<div class="form-check">
    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="{{ $category->id }}" 
    @if(is_array(old('categories')) && in_array($category->id, old('categories')))
        checked 
    @endif>
    <label class="form-check-label" for="{{ $category->id }}">
        {{ $category->name }}
    </label>
</div>

