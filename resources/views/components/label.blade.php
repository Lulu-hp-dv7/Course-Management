@php
    $label ??= '';
    $type ??='';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??='';
@endphp

<label for="{{$name}}" @if ($class) class="{{$class}}" @endif><strong>{{ ucfirst($label) }}:</strong></label>


    @include('components.input',[
        'name' => $name, 
        'type' => $type ,
        'value' => $value,
        'placeholder' => $placeholder
    ])


@error($name)
    <p class="form-text text-danger">{{$message}}</p>
@enderror
    
