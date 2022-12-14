<div class="block hover:bg-gray-50">
    <div class="flex items-center px-4 py-4 sm:px-6">
        <div class="flex min-w-0 flex-1 items-center">
            <a href="{{$user->getRoute()}}" class="flex-shrink-0">
                <img class="h-12 w-12 rounded-full" src="{{$user->avatar()}}" alt="{{$user->name}}">
            </a>
            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                <div>
                    <a href="{{$user->getRoute()}}" class="truncate text-sm font-medium text-indigo-600">{{$user->name}}</a>
                    <p class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: mini/envelope -->
                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                        </svg>
                        <span class="truncate">{{$user->email}}</span>
                    </p>
                </div>
                <div class="hidden md:block">
                    <div>
                        <p class="text-sm text-gray-900">
                            Created
                            {{$user->created_at->diffForHumans()}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div>
            @if($user->id != auth()->user()->id)
                <x-delete-button :wire:key="'delete_button'.$user->id" route="user.delete" :id="$user->id"></x-delete-button>
            @endif
        </div>
    </div>
</div>
