<div x-data="{
    editing:@entangle('editing')
}"
@keyup.window.escape="editing=0"
>
    <x-breadcrumbs :items="[['title'=>'Admin','route'=>'admin'],['title'=>'Forum Categories','route'=>'admin.categories']]"></x-breadcrumbs>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <x-admin-tabs></x-admin-tabs>
        <div class="overflow-hidden bg-white shadow sm:rounded-md">
            <ul wire:sortable="updateCategoryOrder" role="list" class="divide-y divide-gray-200">
                @foreach($categories as $category)
                <li wire:sortable.item="{{$category->id}}" wire:key="category-{{$category->id}}">
                    <div class="block hover:bg-gray-50">
                        <div class="flex items-center px-4 py-4 sm:px-6">
                            <div class="flex min-w-0 flex-1 items-center">
                                <div class="flex-shrink-0">
                                    <button wire:sortable.handle class="cursor-move">
                                        <x-icons.drag></x-icons.drag>
                                    </button>

                                </div>
                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                    <div>
                                        @if($editing == $category->id)
                                            <x-jet-input type="text" wire:model.lazy="title"></x-jet-input>
                                            <x-jet-input-error for="title" class="mt-1"></x-jet-input-error>
                                        @else
                                            <p class="truncate text-sm font-medium text-indigo-600">{{$category->title}}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($editing != $category->id)
                                    <x-jet-button wire:click="edit({{$category->id}})">Edit</x-jet-button>
                                @else
                                <x-success-button wire:click="save();">Save</x-success-button>
                                <x-warning-button wire:click="cancel()">Cancel</x-warning-button>
                                @endif
                                <x-delete-button route="category.delete" :id="$category->id" :wire:key="$category->id"></x-delete-button>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

    </div>
</div>
