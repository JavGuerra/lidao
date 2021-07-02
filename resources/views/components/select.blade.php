@props(['disabled' => false, 'options', 'name', 'objId' ?? ''])

<select name="{{$name}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
    <option value="0"><span class="text-gray-400">{{__('Choose an option')}}</span></option>
    @foreach($options as $option)
    <option value="{{$option->id}}" {{old($name) == $obtion->id || $objId == $option->id ? 'selected' : '' }}>{{$option->name}}</option>
    @endforeach
</select>