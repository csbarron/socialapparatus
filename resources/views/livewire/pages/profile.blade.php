<div>
    <x-breadcrumbs :items="[['title'=>'Profile','route'=>auth()->user()->getRoute()],['title'=>$user->name,'route'=>$user->getRoute()]]"/>
    <div class="bg-white rounded-lg shadow-lg pb-8">
        <div>
            <img class="h-32 w-full object-cover rounded-t lg:h-48" src="{{$user->cover()}}" alt="{{$user->name}}">
        </div>
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                <div class="flex">
                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 bg-white"
                         src="{{$user->avatar()}}" alt="{{$user->name}}">
                </div>

            </div>
            <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                <h1 class="truncate text-2xl font-bold text-gray-900">{{$user->name}}</h1>
            </div>
            <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                    <h1 class="truncate text-2xl font-bold text-gray-900">{{$user->name}}</h1>
                </div>
                <div class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                    <livewire:friends-button :user="$user"></livewire:friends-button>
                    <x-loginas :user="$user"></x-loginas>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-6 max-w-5xl bg-white   border border-dashed p-4 rounded-lg shadow">
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
            @if($user->website)
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Website</dt>
                <dd class="mt-1 text-sm text-gray-900"><x-link :link="$user->website"></x-link></dd>
            </div>
            @endif
            @if($user->facebook)
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Facebook</dt>
                <dd class="mt-1 text-sm text-gray-900"><x-link :link="$user->facebook"></x-link></dd>
            </div>
            @endif
                @if($user->twitter)
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Twitter</dt>
                <dd class="mt-1 text-sm text-gray-900"><x-link :link="$user->twitter"></x-link></dd>
            </div>
            @endif
                @if($user->linkedin)
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Linkedin</dt>
                <dd class="mt-1 text-sm text-gray-900"><x-link :link="$user->linkedin"></x-link></dd>
            </div>
            @endif

            <div class="sm:col-span-2 ">
                <dt class="text-md font-bold text-gray-500">About</dt>
                <dd class="mt-1 max-w-prose space-y-5 text-sm text-gray-900">
                    {!! $user->about !!}
                </dd>
            </div>
        </dl>
    </div>
    <livewire:feed :user="$user"></livewire:feed>
</div>
