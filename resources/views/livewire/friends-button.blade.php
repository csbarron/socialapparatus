<div>
    @if(in_array('add',$showButtons))
        <x-success-button wire:click="addFriend()">
            <x-icons.addfriend class="h-5 w-5 mr-2"></x-icons.addfriend>
            Add Friend
        </x-success-button>
    @endif
    @if(in_array('unfriend',$showButtons))
        <x-jet-danger-button wire:click="unFriend()">
            <x-icons.removefriend class="h-5 w-5 mr-2"></x-icons.removefriend>
            Unfriend
        </x-jet-danger-button>
    @endif
    @if(in_array('cancel',$showButtons))
        <x-warning-button wire:click="cancelRequest()">
            <x-icons.cancel class="h-5 w-5 mr-2"></x-icons.cancel>
            Cancel
        </x-warning-button>
    @endif
    @if(in_array('accept',$showButtons))
        <x-success-button wire:click="acceptRequest()">
            <x-icons.addfriend class="h-5 w-5 mr-2"></x-icons.addfriend>
            Accept
        </x-success-button>

    @endif
    @if(in_array('deny',$showButtons))
        <x-jet-danger-button wire:click="denyRequest()">
            <x-icons.cancel class="h-5 w-5 mr-2"></x-icons.cancel>
            Deny
        </x-jet-danger-button>
    @endif

</div>
