@php($id = Str::random(50))




<div
    class="rounded-md shadow-sm {{$attributes['class']}}"
    x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) },
    }"
    x-init="setValue(); $watch('value', () => isFocused() && setValue())"
    x-on:trix-change="value = $event.target.value"
    {{ $attributes->whereDoesntStartWith('wire:model') }}
    wire:ignore
>
    <input id="{{$id}}" type="hidden">
    <trix-editor x-ref="trix" input="{{$id}}" class="ld-trix-styles bg-white mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500"></trix-editor>
</div>
