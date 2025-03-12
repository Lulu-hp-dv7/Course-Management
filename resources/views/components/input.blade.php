@php
$type ??='';
$name ??= '';
$value ??= '';
$placeholder ??='';
$required ??= false;
@endphp

@if ($type)
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        class="form-control @error('{{ $name }}') is-invalid @enderror"
        value="{{ old( $name, $value) }}" 
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif>
@else
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}" 
        cols="40" rows="4"
        class="form-control @error('{{ $name }}') is-invalid @enderror"
        style="height:150px" 
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif>{{ old($name, $value) }}</textarea>
@endif