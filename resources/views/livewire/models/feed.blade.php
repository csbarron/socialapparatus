<li
    id="feed_{{$feed->id}}"
    x-data="{expanded:false}"
    class="bg-white px-4 py-6 shadow sm:rounded-lg sm:p-6 ">
    <article>
        <div>
            <div class="flex space-x-3">
                <div class="flex-shrink-0">
                    <a href="{{$feed->owner->getRoute()}}">
                        <img class="h-10 w-10 rounded-full" src="{{$feed->owner->avatar()}}" alt="{{$feed->owner->name}}">
                    </a>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="{{$feed->owner->getRoute()}}" class="hover:underline">{{$feed->owner->name}}</a>
                    </p>
                    <p class="text-sm text-gray-500">
                        <a href="#" class="hover:underline">
                            <time datetime="2020-12-09T11:43:00">{{$feed->created_at->diffForHumans()}}</time>
                        </a>
                    </p>
                </div>
                <div class="flex flex-shrink-0 self-center">
                    <div   class="relative inline-block text-left">
                        @if(shane()->canDelete($feed))
                        <x-delete-button route="feed.delete" id="{{$feed->id}}"></x-delete-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2 space-y-4 text-sm text-gray-700 ld-trix-styles">
            {!! $feed->post !!}
        </div>
        <div class="mt-6 flex justify-between space-x-8">
            <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm">
                        <livewire:like-button :wire:key="'like_button_post_'.$feed->id" :model="$feed"></livewire:like-button>
                    </span>
                <span class="inline-flex items-center text-sm">
                          <button @click="expanded = !expanded" type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
</svg>
                            <span class="font-medium text-gray-900">
                                {{$feed->comments()->count()}}
                            </span>

                          </button>
                        </span>
            </div>
        </div>
        <div x-show="expanded" x-transition x-cloak>
            <x-jet-section-border></x-jet-section-border>
            <livewire:comments :model="$feed" :wire:key="'comments_feed_'.$feed->id"></livewire:comments>

        </div>
    </article>
</li>
