@props([
    'title'=>''
])
<div
    x-data="{
        value: @entangle($attributes->wire('model'))
    }"
    class="py-2 border-b border-dashed ">
    <div class="flex items-center">
        <button @click="value=!value" type="button" :class="value ? 'bg-two':'bg-one'" class="  relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-two focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
            <span :class="value ? 'translate-x-5':'translate-x-0'" class="  pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
        </button>
        <span class="ml-3" >
    <span class="text-sm font-medium text-gray-900">{{$title}}</span>

  </span>
    </div>
</div>


