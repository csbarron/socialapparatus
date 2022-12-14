<x-card class="mt-6">
    @if(shane()->friends($user) || $user->id == auth()->user()->id)
    <x-slot name="heading">
        @if(auth()->user()->id !== $user->id)
            Post to {{$user->name}}'s profile
        @else
            What's on your mind?
        @endif
    </x-slot>
    <div class="my-4 border-b border-dashed pb-4">
        <form wire:submit.prevent="save">
            <x-input.rich-text wire:model.lazy="post"></x-input.rich-text>
            <x-jet-input-error for="post" class="mt-1"></x-jet-input-error>
            <div class="flex justify-end mt-4">
                <x-jet-button type="submit">Post</x-jet-button>
            </div>
        </form>
    </div>
    @endif

    <ul role="list" class="space-y-4 mt-4">
        @foreach($feeds as $feed)
            <livewire:models.feed :wire:key="'feed_model_'.$feed->id" :feed="$feed"></livewire:models.feed>
        @endforeach


    </ul>
    @if($feeds->hasPages())
        <div class="mt-2">
            {{$feeds->links()}}
        </div>
    @endif
</x-card>
