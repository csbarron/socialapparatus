<div x-data="{
    viewtype:'gallery'
}" class="flex-1 overflow-y-auto">
    <x-breadcrumbs :items="[['title'=>'Community','route'=>route('community')]]"/>
    <div class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8 bg-white rounded-lg shadow-lg">
        <div class="flex">

            <div class="ml-6 flex items-center rounded-lg bg-gray-100 p-0.5 sm:hidden">
                <button @click="viewtype='list'" type="button" :class="viewtype=='list' ? 'bg-white':''" class="rounded-md p-1.5 text-gray-400 hover:bg-white hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <!-- Heroicon name: mini/bars-4 -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 3.75A.75.75 0 012.75 3h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 3.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.166a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                    </svg>
                </button>
                <button @click="viewtype = 'gallery'" type="button" :class="viewtype=='gallery' ? 'bg-white':''" class="ml-0.5 rounded-md p-1.5 text-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <!-- Heroicon name: mini/squares-2x2 -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mt-3 sm:mt-2 bg-gray-50 p-2 rounded shadow">

            <div class="hidden sm:flex items-center justify-between">
                    <x-jet-input wire:model="q" type="text" placeholder="Filter..."></x-jet-input>
                <div class="flex items-center justify-end  ">

                    <div class="ml-6 hidden items-center rounded-lg bg-gray-100 p-0.5 sm:flex">
                        <button @click="viewtype='list'" type="button" :class="viewtype === 'gallery' ? '':'bg-white'" class="rounded-md p-1.5 text-gray-400 hover:bg-white hover:shadow-sm focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <!-- Heroicon name: mini/bars-4 -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M2 3.75A.75.75 0 012.75 3h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 3.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.166a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button @click="viewtype='gallery'" type="button" :class="viewtype=='gallery'?'bg-white':''" class="ml-0.5 rounded-md p-1.5 text-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <!-- Heroicon name: mini/squares-2x2 -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>




        <section class="mt-8 pb-16"  >
            <ul x-cloak :class="viewtype === 'gallery' ? 'grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8':'divide-y divide-gray-200'" role="list" >
               @foreach($users as $user)
                <li x-transition :class="viewtype === 'gallery' ? 'relative':'flex mb-2 py-4 items-center bg-white p-4 rounded-lg shadow-lg'" class="rounded-lg shadow-lg border-2 border-dashed " >
                    <a  href="{{$user->getRoute()}}">
                        <div x-show="viewtype==='gallery'" class=" group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden">
                            <img src="{{$user->avatar()}}" alt="{{$user->name}}" class="object-cover">
                        </div>
                        <p x-show="viewtype=='gallery'" class="p-4 mt-2 block truncate   font-medium text-gray-900">{{$user->name}}</p>
                    </a>
                    <a x-show="viewtype !== 'gallery'" x-cloak class="flex items-center " href="{{$user->getRoute()}}">
                    <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">{{$user->name}}</p>
                    </div>
                    </a>
                </li>
                @endforeach

            </ul>
            @if($users->hasPages())
                <x-jet-section-border></x-jet-section-border>
                <div class="mt-4">
                    {{$users->links()}}
                </div>
                @endif
        </section>




    </div>
</div>

