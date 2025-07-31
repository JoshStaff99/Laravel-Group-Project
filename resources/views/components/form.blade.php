{{-- components/form.blade.php --}}
<form action="{{ $action }}" method="POST">
    @csrf
    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    @foreach ($fields as $field)
        <div class="form-group">
            <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>

            @if ($field['type'] === 'select')
                <select name="{{ $field['name'] }}" id="{{ $field['name'] }}" class="form-control" {{ $field['required'] ?? false ? 'required' : '' }}>
                    <option value="">{{ $field['placeholder'] ?? '-- Select --' }}</option>
                    @foreach ($field['options'] as $option)
                        <option value="{{ $option['value'] }}"
                            {{ old($field['name'], $model->{$field['name']} ?? '') == $option['value'] ? 'selected' : '' }}>
                            {{ $option['label'] }}
                        </option>
                    @endforeach
                </select>
            @else
                <input 
                    type="{{ $field['type'] }}" 
                    name="{{ $field['name'] }}" 
                    id="{{ $field['name'] }}" 
                    class="form-control"
                    value="{{ old($field['name'], $model->{$field['name']} ?? '') }}"
                    {{ $field['required'] ?? false ? 'required' : '' }}
                    {{ isset($field['step']) ? "step={$field['step']}" : '' }}
                    {{ isset($field['min']) ? "min={$field['min']}" : '' }}
                >
            @endif
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary mt-3">{{ $buttonText ?? 'Save' }}</button>
</form>