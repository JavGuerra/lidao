@props(['disabled' => false, 'options', 'name', 'selected' => '', 'byDefect' => 'Choose an option'])
<select name="{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-gray-800 dark:text-gray-200 bg-white dark:bg-black border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="">{{__($byDefect)}}</option>
    @foreach($options as $option)
    <option value="{{$option->id}}" {{(old($name) == $option->id || $selected == $option->id) ? 'selected' : '' }}>{{__($option->name)}}</option>
    @endforeach
</select>