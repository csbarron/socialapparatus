<div>
    <x-breadcrumbs :items="[['title'=>'Create a new post','route'=>route('post.create')]]" />
    <form wire:submit.prevent="save" class="mt-6 bg-white p-4 rounded-lg shadow-lg space-y-8 divide-y divide-y-blue-gray-200">
        <div class="grid grid-cols-1 gap-y-6 ">


            <div>
                <label for="category" class="block text-sm font-medium text-blue-gray-900">Category</label>
                <select wire:model="category" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>


            <div>
                <label for="title" class="block text-sm font-medium text-blue-gray-900"> Post Title </label>
                <input type="text" wire:model="title" class="mt-1 block w-full border-blue-gray-300 rounded-md shadow-sm text-blue-gray-900 sm:text-sm focus:ring-blue-500 focus:border-blue-500">
                <x-jet-input-error for="title" class="mt-1"></x-jet-input-error>
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-blue-gray-900"> Post Body </label>
                <div class="mt-1">
                    <x-input.rich-text wire:model="body"></x-input.rich-text>
                </div>
                <x-jet-input-error for="body" class="mt-1"></x-jet-input-error>

            </div>
            <div>
                <label for="photos" class="block text-sm font-medium text-blue-gray-900">Photos (optional)</label>
                <div class="mt-1">
                    <x-input.filepond wire:model="photos" multiple="true"></x-input.filepond>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{route('home')}}">
                    <x-jet-danger-button class="mr-2">Cancel</x-jet-danger-button>
                </a>
                <x-jet-button type="submit">Post</x-jet-button>
            </div>
        </div>

    </form>

</div>
