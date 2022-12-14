<div class="flow-root">
    <ul role="list" class="mb-2 bg-gray-50 p-4 rounded shadow">
        @foreach($comments as $comment)
        <li>
            <div id="comment_{{$comment->id}}" class="relative ">
                @if(!$loop->last)
                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" ></span>
                @endif
                    <div class="relative flex items-start space-x-3">
                        <a href="{{$comment->user->getRoute()}}" class="relative">
                            <img class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white" src="{{$comment->user->avatar()}}" alt="{{$comment->user->name}}">

                            <span class="absolute -bottom-0.5 -right-1 rounded-tl bg-white px-0.5 py-px">
              <!-- Heroicon name: mini/chat-bubble-left-ellipsis -->
              <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
              </svg>
            </span>
                        </a>
                        <div class="min-w-0 flex-1">
                            <div>


                            <div class="flex justify-between">
                                <div>
                                    <div class="text-sm">
                                        <a href="{{$comment->user->getRoute()}}" class="font-medium text-gray-900">{{$comment->user->name}}</a>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">Commented {{$comment->created_at->diffForHumans()}}</p>
                                    <div class=" text-md text-gray-700 mt-1">


                                        {{$comment->comment}}

                                    </div>
                                </div>

                                <div>
                                    <x-delete-button route="comment.delete" id="{{$comment->id}}"></x-delete-button>
                                </div>
                            </div>
                        </div>
                            <hr class="py-1 mt-1"/>
                            <livewire:like-button :model="$comment" :wire:key="'like_button_comments_'.$comment->id"></livewire:like-button>
                        </div>
                    </div>

            </div>
        </li>
        @endforeach

    </ul>
    @auth
        @if(shane()->canComment($model))
            <form wire:submit.prevent="save" class="flex items-end">
                <img class="rounded-full mr-2 w-10" src="{{auth()->user()->profile_photo_url}}" alt="{{auth()->user()->name}}"/>
                <x-input.textarea  wire:model.lazy="comment"  placeholder="Leave a comment..." class="w-full"></x-input.textarea>
                <x-success-button class="ml-2">Post</x-success-button>
            </form>
        <x-jet-input-error for="comment" class="mt-1"></x-jet-input-error>
        @endif
     @endauth
</div>
