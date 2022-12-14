<x-jet-form-section submit="updateCoverPhoto">
    <x-slot name="title">
        {{ __('Profile Cover Photo') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile cover photo.') }}
    </x-slot>

    <x-slot name="form">

    <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Cover Photo') }}" />
            <x-input.filepond class="mt-1" wire:model.defer="photo"></x-input.filepond>
            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            @if(!$photo)
            <img src="{{$user->cover()}}" alt="Cover photo"/>
                @else
            <img src="{{$photo->temporaryUrl()}}" alt="Cover photo"/>
                @endif
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
