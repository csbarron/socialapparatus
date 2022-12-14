@props([
    'items'=>[]
])
<nav class="flex bg-two rounded-lg mb-4">
    <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
        <li class="flex">
            <div class="flex items-center">
                <a href="{{route('home')}}" class="text-white hover:text-gray-50">
                    <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
                        <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>
        @foreach($items as $item)
        <li class="flex">
            <div class="flex items-center text-white">
                <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="{{$item['route']}}" class="ml-4 text-sm font-medium text-white hover:text-gray-50">{{$item['title']}}</a>
            </div>
        </li>
        @endforeach

    </ol>
</nav>
