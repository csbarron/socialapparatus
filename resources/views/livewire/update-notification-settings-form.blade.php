<x-jet-form-section submit="updateNotificationPreferences">
    <x-slot name="title">
        {{ __('Notification Preferences') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s notification preferences.') }}
    </x-slot>

    <x-slot name="form">



        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <div class="font-bold">Email</div>
            <small>Notify me via email when someone:</small>
            <x-input.toggle wire:model="settings.ef" title="Someone posts to my profile."></x-input.toggle>
            <x-input.toggle wire:model="settings.elf" title="Someone likes one of my profile posts."></x-input.toggle>
            <x-input.toggle wire:model="settings.ecf" title="Someone comments on a post on my profile."></x-input.toggle>
            <x-input.toggle wire:model="settings.efr" title="Someone sends me a friend request."></x-input.toggle>
            <x-input.toggle wire:model="settings.efa" title="Someone accepts my friend request."></x-input.toggle>
            <x-input.toggle wire:model="settings.elp" title="Someone likes my forum post."></x-input.toggle>
            <x-input.toggle wire:model="settings.ecp" title="Someone comments on my forum post."></x-input.toggle>
            <x-input.toggle wire:model="settings.elc" title="Someone likes one of my comments."></x-input.toggle>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="font-bold">Site</div>
            <small>Notify me via site when someone:</small>
            <x-input.toggle wire:model="settings.sf" title="Someone posts to my profile."></x-input.toggle>
            <x-input.toggle wire:model="settings.slf" title="Someone likes one of my profile posts."></x-input.toggle>
            <x-input.toggle wire:model="settings.scf" title="Someone comments on a post on my profile."></x-input.toggle>
            <x-input.toggle wire:model="settings.sfr" title="Someone sends me a friend request."></x-input.toggle>
            <x-input.toggle wire:model="settings.sfa" title="Someone accepts my friend request."></x-input.toggle>
            <x-input.toggle wire:model="settings.slp" title="Someone likes my forum post."></x-input.toggle>
            <x-input.toggle wire:model="settings.scp" title="Someone comments on my forum post."></x-input.toggle>
            <x-input.toggle wire:model="settings.slc" title="Someone likes one of my comments."></x-input.toggle>

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
