<div
    x-data="{
        tab:@entangle('tab')
    }"
>
    <x-breadcrumbs :items="[['title'=>'Notifications','route'=>route('notifications')]]"></x-breadcrumbs>
    <div class="mb-4 bg-white p-2 rounded-lg shadow-lg">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                <option>All</option>

                <option>Unread</option>

            </select>
        </div>
        <div class="hidden sm:block">
            <nav class="flex space-x-4" aria-label="Tabs">
                <button wire:click="setTab('all')" :class="tab == 'all' ? 'bg-indigo-100 text-indigo-700':'text-gray-500 hover:text-gray-700'" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">All ({{$all}})</button>

                <button wire:click="setTab('unread')" :class="tab == 'unread' ? 'bg-indigo-100 text-indigo-700':'text-gray-500 hover:text-gray-700'" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm rounded-md">Unread ({{$unread}})</button>
            </nav>
        </div>
    </div>

    <div class=" bg-white shadow sm:rounded-md">

        <ul role="list" class="divide-y divide-gray-200">
            @foreach($notifications as $notification)


                <li wire:key="notification_{{$notification->id}}" key="notification_{{$notification->id}}">

                    <div class="block hover:bg-gray-50 rounded-lg">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="flex min-w-0 flex-1 items-center">
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>

                                        <button wire:click="gotourl({{$notification}})"
                                                class="text-left w-full text-sm font-medium text-indigo-600"> {{$notification->data['subject']}}</button>
                                        <p class="mt-1 flex items-center text-sm text-gray-500">
                                            <span class="truncate">{{$notification->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center">
                                @if($notification->read())
                                    <x-jet-secondary-button wire:click="markUnread({{$notification}})">Mark as unread</x-jet-secondary-button>
                                @else
                                    <x-success-button wire:click="markRead({{$notification}})">Mark as read</x-success-button>
                                @endif
                                <x-delete-button key="delete_button_{{$notification->id}}" wire:key="delete_button{{$notification->id}}" class="ml-2" route="notification.delete" :id="$notification->id"></x-delete-button>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>

