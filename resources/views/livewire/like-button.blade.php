<button
    x-data="{
        liked:@entangle('liked'),
        likes:@entangle('likes')
    }"
    @if($liked) title="You like this." @endif
    class="flex items-center" wire:click="like">
    <x-icons.like x-show="!liked" x-cloak class="text-blue-400 h-5 w-5 mr-2"></x-icons.like>
    <x-icons.liked x-show="liked" x-cloak class="text-blue-400 h-5 w-5 mr-2"></x-icons.liked>

    <span class="font-medium text-gray-900" x-text="likes"></span>
</button>
