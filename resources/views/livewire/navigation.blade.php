<header
    x-data="{
        mobile:false,
        profile:false,
        setMobile:function(mobile) {
            this.mobile=mobile;
            if(mobile) {
                document.body.classList.add('overflow-hidden');
            } else {
                document.body.classList.remove('overflow-hidden');
            }
        }
    }"
    @keyup.window.escape="setMobile(false);profile=false;"
    :class="mobile ? 'fixed inset-0 z-40 overflow-y-auto':''"
    class="bg-two shadow-sm lg:static lg:overflow-y-visible ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between py-2">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a class="block h-8 w-auto font-bold text-white text-2xl" href="{{route('home')}}">
                        {{\App\Models\Settings::first()->site_name}}
                    </a>
                </div>
            </div>

            <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                <button @click="setMobile(!mobile)" type="button"
                        class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400  focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500"
                        aria-expanded="false">
                    <svg x-show="!mobile" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    <svg x-show="mobile" x-cloak class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                @auth
                    <a href="{{route('notifications')}}"
                       class="ml-5 h-6 w-6 relative text-white hover:text-gray-50 focus:outline-none  ">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                        </svg>
                        @if(auth()->user()->unreadNotifications()->count() >0)
                            <div
                                class="absolute h-2 w-2 right-0 top-0 rounded-full p-1 bg-red-500 text-white text-sm"></div>
                        @endif
                    </a>



                    <!-- Profile dropdown -->
                    <div class="flex-shrink-0 relative ml-5">
                        <div>
                            <button @click="profile=!profile" type="button"
                                    class="bg-white rounded-full flex focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{auth()->user()->avatar()}}"
                                     alt="{{auth()->user()->name}}">
                            </button>
                        </div>
                        <div x-show="profile" x-cloak
                             @click.outside="profile=false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"

                             class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{auth()->user()->getRoute()}}"
                               class="{{request()->routeIs('profile') ? 'bg-gray-100 hover:bg-gray-200':'hover:bg-gray-50'}}  block py-2 px-4 text-sm text-gray-700"
                               role="menuitem">Your Profile</a>
                            <a href="{{route('user.edit')}}"
                               class="{{request()->routeIs('user.edit') ? 'bg-gray-100 hover:bg-gray-200':'hover:bg-gray-50'}} block py-2 px-4 text-sm text-gray-700"
                               role="menuitem">Edit Profile</a>

                            <a href="{{route('profile.show')}}"
                               class="{{request()->routeIs('profile.show') ? 'bg-gray-100 hover:bg-gray-200':'hover:bg-gray-50'}} block py-2 px-4 text-sm text-gray-700"
                               role="menuitem">Settings</a>
                            @if(shane()->isAdmin())
                            <a href="{{route('admin')}}"
                               class="{{request()->routeIs('admin') ? 'bg-gray-100 hover:bg-gray-200':'hover:bg-gray-50'}} block py-2 px-4 text-sm text-gray-700"
                               role="menuitem">Admin</a>
                            @endif
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left hover:bg-gray-50 block py-2 px-4 text-sm text-gray-700"
                                        role="menuitem">Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <a href="{{route('login')}}">
                        <x-jet-secondary-button class="ml-2">Login</x-jet-secondary-button>
                    </a>
                    <a href="{{route('register')}}">
                        <x-jet-button class="ml-2">Join</x-jet-button>
                    </a>
                @endguest
                <a href="{{route('post.create')}}">
                    <x-jet-danger-button class=" ml-6 ">New Post</x-jet-danger-button>
                </a>
            </div>
        </div>
    </div>
    <nav x-show="mobile" x-cloak

         class="lg:hidden" aria-label="Global">
        <div class="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4 border-b border-gray-200 border-dashed">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->
            <a href="{{route('home')}}" aria-current="page"
               class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium">Home</a>

            <a href="{{route('community')}}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium">Community</a>
        </div>
        <div class="max-w-3xl mx-auto justify-start px-4 gap-1 flex flex-wrap items-center sm:px-6">
            @foreach(\App\Models\Category::orderBy('order','asc')->get() as $category)
            <a href="{{$category->getRoute()}}" class="inline my-1  items-center rounded-full bg-blue-100 px-3 py-0.5 text-sm font-medium text-blue-800">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="border-t border-gray-200 border-dashed pt-4">
            @auth
            <div class="max-w-3xl mx-auto justify-between px-4 flex items-center sm:px-6">
                <div>
                    <div class=" flex items-center flex-shrink-0">
                        <img class="h-10 w-10 rounded-full"
                             src="{{auth()->user()->avatar()}}"
                             alt="{{auth()->user()->name}}">
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{auth()->user()->name}}</div>
                        </div>
                    </div>

                </div>

                <a href="{{route('notifications')}}"
                   class="ml-5 h-6 w-6 relative bg-white text-gray-400 hover:text-gray-500 focus:outline-none  ">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                    </svg>
                    @if(auth()->user()->unreadNotifications()->count() >0)
                        <div
                            class="absolute h-2 w-2 right-0 top-0 rounded-full p-1 bg-red-500 text-white text-sm"></div>
                    @endif
                </a>
            </div>

            <div class="mt-3 max-w-3xl mx-auto px-2 space-y-1 sm:px-4">
                <a href="{{route('profile')}}"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your
                    Profile</a>
                <a href="{{route('user.edit')}}"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Edit Profile</a>

                <a href="{{route('profile.show')}}"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>
                @if(shane()->isAdmin())
                <a href="{{route('admin')}}"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Admin</a>
                @endif
                <form method="post" action="logout">
                    @csrf

                <button type="submit"
                   class="w-full text-left block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Sign
                    out</button>
                </form>
            </div>
            @endauth
        </div>

        <div class="mt-6 max-w-3xl mx-auto px-4 sm:px-6">
            @guest
                <a href="{{route('login')}}"
                   class="mb-2 w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
                    Login </a>
                <a href="{{route('register')}}"
                   class="mb-2 w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                    Join </a>
            @endguest
            <a href="{{route('post.create')}}"
               class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-rose-600 hover:bg-rose-700">
                New Post </a>

        </div>
    </nav>
</header>
