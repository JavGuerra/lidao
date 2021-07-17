@props(['disabled' => false, 'options', 'name', 'sel' => ''])
<select name="{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="">{{__('Choose an option')}}</option>
    @foreach($options as $option)
    <option value="{{$option->id}}" {{(old($name) == $option->id || $sel == $option->id) ? 'selected' : '' }}>{{__($option->name)}}</option>
    @endforeach
</select>