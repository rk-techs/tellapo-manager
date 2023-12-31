<div class="row">
    <div class="col">
        <label for="{{ $id }}" class="form-label">
            <span class="label-text">{{ $label }}</span>
            @if($isRequired ?? false)
                <span class="required-label">必須</span>
            @endif
        </label>

        <select id="{{ $id }}"
                class="form-select @error($name){{ 'is-invalid' }}@enderror" name="{{ $name }}">
            <option hidden value="">{{ $placeholder ?? '選択してください' }}</option>
            @foreach ($options as $option)
                <option value="{{ $option->id }}"
                        @if(old($name, $model->{$name} ?? null) == $option->id) selected @endif>
                        {{ data_get($option, $displayAttribute) }}
                </option>
            @endforeach
        </select>

        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
