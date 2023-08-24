<div class="row">
    <div class="col">
        <label for="{{ $id }}" class="form-label">
            <span class="label-txt">{{ $label }}</span>
            @if (isset($required) && $required)
                <span class="required-label">必須</span>
            @endif
        </label>
        <input id="{{ $id }}" type="{{ $type ?? 'text' }}" class="input-field @error($name) is-invalid @enderror"
            name="{{ $name }}" value="{{ old($name) }}">
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
