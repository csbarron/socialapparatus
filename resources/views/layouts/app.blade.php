<!DOCTYPE html>
<html  class="h-full bg-one" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{\App\Models\Settings::first()->site_name}}</title>
        <meta name="description" value="{{\App\Models\Settings::first()->site_description}}">
        <meta name="keywords" value="{{\App\Models\Settings::first()->keywords}}">
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.3/filepond.css" integrity="sha512-lA1v3OiAORI4FvglHuwPns240yxZFQiirFBS+93lmHG9v8qzAjHhlC69Ba/B/GlJKIfkBbp2NzfaQM25t1vVKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
        <link href="/lightbox/css/lightbox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
        @livewireStyles
    </head>
    <body class="h-full font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-full">
            <livewire:navigation></livewire:navigation>

            <div class="py-10">
                <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                        <nav class="sticky top-4  bg-two p-2 shadow-lg rounded-lg">
                            <div class="pb-2 space-y-1">
                                <a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'bg-gray-50 hover:bg-gray-50 text-black':' hover:bg-three  '}} text-white group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <svg class="{{request()->routeIs('home') ? 'text-black':''}} text-white flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    <span class="truncate"> Home </span>
                                </a>

                                <a href="{{route('community')}}" class="{{request()->routeIs('community') ? 'bg-gray-50 hover:bg-gray-50 text-black':' hover:bg-three  '}} text-white group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{request()->routeIs('community') ? 'text-black':''}} text-white flex-shrink-0 -ml-1 mr-3 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>

                                    <span class="truncate"> Community </span>
                                </a>

                            </div>
                            <x-jet-section-border></x-jet-section-border>

                            <livewire:categories></livewire:categories>
                        </nav>
                    </div>
                    <main class=" @if(shane()->showAside()) lg:col-span-9 xl:col-span-6  @else lg:col-span-9 xl:col-span-9 @endif  sticky top-4">
                        {{$slot}}
                    </main>
                    @if(shane()->showAside())
                        <aside class="hidden xl:block xl:col-span-4">
                        <div class="sticky top-4 space-y-4">
                            <livewire:who-to-follow></livewire:who-to-follow>
{{--                            <livewire:trending></livewire:trending>--}}
                        </div>
                    </aside>
                    @endif
                </div>
            </div>
        </div>
        @livewireScripts
        @stack('modals')
        <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script>
        <script>
            Trix.config.blockAttributes.heading1 = {
                tagName: "h2",
                terminal: true,
                breakOnReturn: true,
                group: false
            }

            Trix.config.blockAttributes.heading2 = {
                tagName: "h3",
                terminal: true,
                breakOnReturn: true,
                group: false
            }

            Trix.config.blockAttributes.code = {
                tagName: 'code',
                terminal:true,
                breakOnReturn:false,
                group:false
            }
        </script>
        <script src='https://unpkg.com/prismjs@1.27.0/components/prism-core.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.3/filepond.min.js" integrity="sha512-AuMJiyTn/5k+gog21BWPrcoAC+CgOoobePSRqwsOyCSPo3Zj64eHyOsqDev8Yn9H45WUJmzbe9RaLTdFKkO0KQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/lightbox/js/lightbox-plus-jquery.js"></script>



    </body>
</html>
