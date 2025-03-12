@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $id ??= '';
    $label ??= Str::ucfirst($name);
@endphp
<div @class(['form-group', $class])>

    <label for="{{ $name }}" class="form-label"><strong>{{ $label }}:</strong></label>
    
    <select class="form-select" name="{{ $name }}" id="{{ $name }}">
        <option>-Veuillez Choisir-</option>
        @foreach ($items as $key => $val)
            <option @selected(old($name, $id) == $key) value="{{ $key }}">{{ $val }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror
</div>