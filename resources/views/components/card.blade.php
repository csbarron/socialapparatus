@props([
    'heading'=>''
])
<div {{$attributes->merge(['class'=>'overflow-hidden bg-gray-50 sm:rounded-lg sm:shadow  rounded-lg shadow'])}}>
@if($heading)
    <div class="border-b border-gray-200 bg-gray-400 px-4 py-2 sm:px-4 mb-4">
        <h3 class="text-md font-bold leading-6 text-white">{{$heading}}</h3>
    </div>
    @endif
<div class="p-4">
    {{$slot}}
</div>

</div>
