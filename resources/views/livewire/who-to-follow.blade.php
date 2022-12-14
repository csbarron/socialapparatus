<section >
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 id="who-to-follow-heading" class="text-base font-medium text-gray-900">Latest Members</h2>
            <div class="mt-6 flow-root">
                <ul role="list" class="-my-4 divide-y divide-gray-200">
                    @foreach(\App\Models\User::orderBy('created_at','desc')->limit(4)->get() as $user)
                    <li class="flex items-center py-4 space-x-3">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full" src="{{$user->avatar()}}" alt="{{$user->name}}">
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                <a href="{{$user->getRoute()}}">{{$user->name}}</a>
                            </p>
                            <p class="text-sm text-gray-500">
                                Joined: {{$user->created_at->diffForHumans()}}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <livewire:friends-button :user="$user" :wire:key="'friend_button_'.$user->id"></livewire:friends-button>
                        </div>
                    </li>
                    @endforeach
                    <!-- More people... -->
                </ul>
            </div>
            @if(shane()->route !== 'community')
            <div class="mt-6">
                <a class="flex justify-end" href="{{route('community')}}" >
                    <x-jet-secondary-button  >

                        View all
                    </x-jet-secondary-button>
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
