<li x-data="{
    expanded:false
}" class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg"
id="post_{{$post->id}}">
    <article >
        <div>
            <div class="flex space-x-3">
                <a href="{{$post->user->getRoute()}}" class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{$post->user->avatar()}}" alt="{{$post->user->name}}">
                </a>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        <a href="{{$post->user->getRoute()}}" class="hover:underline">{{$post->user->name}}</a>
                    </p>
                    <p class="text-sm text-gray-500">
                        <div >
                            <time datetime="2020-12-09T11:43:00">{{$post->created_at->diffForHumans()}}</time>
                        </div>
                    </p>
                </div>
                @if(shane()->canDelete($post))
                <div class="flex-shrink-0 self-center flex">
                    <div class="relative inline-block text-left">
                        <x-delete-button :route="'post.delete'" :id="$post->id"></x-delete-button>



                    </div>
                </div>
                    @endif
            </div>
            <x-jet-section-border></x-jet-section-border>
            <h2 class="mt-4 text-base font-medium text-gray-900">{{$post->title}}</h2>
        </div>

        <div class="mt-2 text-sm text-gray-700 space-y-4 ">
            {!! $post->body !!}
        </div>


        <!-- Gallery -->
        @if($post->photos->count() >0)
        <section class="mt-8 " >
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @php($x=0)
                @foreach($post->photos as $photo)
                    @if($x<3)
                <li class=" relative  ">
                    <a href="{{asset("storage/".$photo->path)}}" data-lightbox="{{$post->id}}" class="ring-2 ring-offset-2 ring-indigo-500 group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;ring-2 ring-offset-2 ring-indigo-500&quot;, Default: &quot;focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500&quot;">
                        <img src="{{asset("storage/".$photo->path)}}" alt="{{$post->title}}" class=" object-cover pointer-events-none" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;&quot;, Default: &quot;group-hover:opacity-75&quot;">
                    </a>
                </li>

                    @endif
                        @php($x++)
                @endforeach






            </ul>
            @if($post->photos()->count() > 3)
                <a href="{{asset("storage/".$post->photos[3]->path)}}" data-lightbox="{{$post->id}}">
                    <x-jet-secondary-button class="mt-4">
                        {{$post->photos()->count() - 3}} more photos
                    </x-jet-secondary-button>
                </a>

                @endif
            @php($x = 0)
            <div class="hidden">
                @foreach($post->photos as $photo)
                    @if($x>3)
                        <a href="{{asset("storage/".$photo->path)}}" data-lightbox="{{$post->id}}">
                            <img src="{{asset("storage/".$photo->path)}}" alt="{{$post->title}}"/>
                        </a>
                    @endif
                    @php($x++)
                @endforeach
            </div>

        </section>
        @endif
        <div class="mt-6 flex justify-between space-x-8">
            <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm">
                        <livewire:like-button :wire:key="'like_button_post_'.$post->id" :model="$post"></livewire:like-button>
                    </span>
                <span class="inline-flex items-center text-sm">
                          <button @click="expanded = !expanded" type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" x-description="Heroicon name: mini/chat-bubble-left-ellipsis" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902.848.137 1.705.248 2.57.331v3.443a.75.75 0 001.28.53l3.58-3.579a.78.78 0 01.527-.224 41.202 41.202 0 005.183-.5c1.437-.232 2.43-1.49 2.43-2.903V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zm0 7a1 1 0 100-2 1 1 0 000 2zM8 8a1 1 0 11-2 0 1 1 0 012 0zm5 1a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
</svg>
                            <span class="font-medium text-gray-900">{{$post->comments()->count()}}</span>

                          </button>
                        </span>
            </div>

        </div>
        <div x-show="expanded" x-transition x-cloak>
            <x-jet-section-border></x-jet-section-border>
            <livewire:comments :model="$post" :wire:key="'comments_posts_'.$post->id"></livewire:comments>

        </div>

    </article>
</li>
