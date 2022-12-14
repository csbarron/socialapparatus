<x-jet-form-section submit="updateAboutMe">
    <x-slot name="title">
        {{ __('About you') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your about info.') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="about" value="{{ __('About You') }}" />
            <x-input.rich-text wire:model.defer="about" class="mt-1 small"></x-input.rich-text>
            <x-jet-input-error for="about" class="mt-2" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="about">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
