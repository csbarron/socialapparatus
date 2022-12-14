<div>

    <div wire:ignore>
        <nav class="flex space-x-4 mb-4"  >
            <!-- Current: "", Default: "" -->
            <a href="{{route('admin')}}"   class="{{request()->routeIs('admin') ? 'bg-gray-100 text-gray-700':'text-gray-500 hover:text-gray-700'}} px-3 py-2 font-medium text-sm rounded-md">Users</a>

            <a href="{{route('admin.posts')}}"  class="{{request()->routeIs('admin.posts') ? 'bg-gray-100 text-gray-700':'text-gray-500 hover:text-gray-700'}}  px-3 py-2 font-medium text-sm rounded-md">Forum Posts</a>

            <a href="{{route('admin.categories')}}" class="{{request()->routeIs('admin.categories') ? 'bg-gray-100 text-gray-700':'text-gray-500 hover:text-gray-700'}}  px-3 py-2 font-medium text-sm rounded-md" >Forum Categories</a>
            <a href="{{route('admin.general')}}" class="{{request()->routeIs('admin.general') ? 'bg-gray-100 text-gray-700':'text-gray-500 hover:text-gray-700'}}  px-3 py-2 font-medium text-sm rounded-md" >General</a>

        </nav>
    </div>
</div>
