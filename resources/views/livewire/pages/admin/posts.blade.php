<div>
    <x-breadcrumbs :items="[['title'=>'Admin','route'=>'admin'],['title'=>'Users','route'=>'admin']]"></x-breadcrumbs>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <x-admin-tabs></x-admin-tabs>
        <x-jet-input wire:model="q" type="text" class="w-full mb-2" placeholder="Filter..."></x-jet-input>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($posts as $post)
                <li>
                    <div class="block hover:bg-gray-50">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="flex min-w-0 flex-1 items-center">
                                <a href="{{$post->user->getRoute()}}" class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full" src="{{$post->user->avatar()}}" alt="{{$post->user->name}}">
                                </a>
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        <a href="{{$post->user->getRoute()}}" class="truncate text-sm font-medium text-indigo-600">{{$post->user->name}}</a>
                                        <a href="{{$post->getRoute()}}" class="truncate mt-2 flex items-center text-sm text-gray-500">
                                            {{$post->title}}
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <x-delete-button route="post.delete" :id="$post->id"></x-delete-button>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>

    </div>
</div>
