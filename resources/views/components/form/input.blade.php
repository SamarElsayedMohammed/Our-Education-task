@props([
    'type' => 'text', 'name', 'value' => "", 'label' => false,'id'=>'','labelName'=>''
])

@if($label)
<x-form.label for="{{$id}}">{{$labelName}}</x-form.label>
@endif

<input 
    id="{{$id}}"
    type="{{ $type }}"
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name)
    ]) }}
    value="{{ old($name, $value) }}"
>

<x-form.error-feedback :name="$name" />