@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $multiple ??= false;
    $id ??= '';
    $label ??= Str::ucfirst($name);
@endphp
<div @class(['form-group', $class])>

    <label for="{{ $name }}" class="form-label"><strong>{{ $label }}:</strong></label>
    @if ($multiple)
        <select class="form-select" name="{{ $name }}[]" id="{{ $name }}" multiple>
            <option>-Veuillez Choisir-</option>
            @foreach ($items as $key => $val)
                <option @selected($sectorsIds->contains($key)) value="{{ $key }}">{{ $val }}</option>
            @endforeach
        </select>
    @else
        <select class="form-select" name="{{ $name }}" id="{{ $name }}">
            <option>-Veuillez Choisir-</option>
            @foreach ($items as $key => $val)
                <option @selected(old($name, $value)) value="{{ $key }}">{{ $val }}</option>
            @endforeach
        </select>
    @endif

    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>