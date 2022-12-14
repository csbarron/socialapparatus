<div>
    @foreach($categories as $category)
        <a wire:key="{{$category->id}}" href="{{$category->getRoute()}}" class="text-white flex items-center justify-between {{ request()->routeIs('category') && request('id') == $category->id  ? 'hover:bg-gray-100 bg-gray-200 text-black':' hover:bg-gray-100' }} group flex items-center px-3 py-1 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 ">
            <span class="truncate"> {{$category->title}} </span>
            <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                {{$category->posts()->count()}}
            </span>
        </a>
    @endforeach
</div>

