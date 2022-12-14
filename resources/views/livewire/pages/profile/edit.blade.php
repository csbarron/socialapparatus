<div class="flex-1 xl:overflow-y-auto">
    <x-breadcrumbs :items="[['title'=>'Edit Profile','route'=>route('user.edit')]]" />
                        <div class="bg-white rounded-lg shadow-lg p-4 ">

                            <form wire:submit.prevent="save" class="divide-y-blue-gray-200 mt-6 space-y-8 divide-y">
                                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 sm:gap-x-6">


                                    <div class="sm:col-span-6">
                                        <label for="name" class="block text-sm font-medium text-blue-gray-900">Name</label>
                                        <input wire:model="name" type="text"  class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <x-jet-input-error for="name" class="mt-1"></x-jet-input-error>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="avatar" class="block text-sm font-medium text-blue-gray-900">Avatar</label>
                                        <div class="mt-1 flex items-center">
                                            @if(is_string($avatar_url))
                                                <img class="inline-block h-12 w-12 rounded-full" src="{{auth()->user()->avatar()}}" alt="{{auth()->user()->name}}">
                                            @elseif(!is_string($avatar_url))
                                                <img class="inline-block h-12 w-12 rounded-full" src="{{$avatar_url->temporaryUrl()}}" alt="{{auth()->user()->name}}">

                                            @endif
                                            <div class="ml-4 flex">
                                                <div class="relative flex cursor-pointer items-center rounded-md border border-blue-gray-300 bg-white py-2 px-3 shadow-sm focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 hover:bg-blue-gray-50">
                                                    <label for="avatar" class="pointer-events-none relative text-sm font-medium text-blue-gray-900">
                                                        <span>Change</span>
                                                    </label>
                                                    <input wire:model="avatar_url" type="file" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                                </div>
                                                @if(auth()->user()->avatar_url)
                                                    <button wire:click="removeAvatar()" type="button" class="ml-3 rounded-md border border-transparent bg-transparent py-2 px-3 text-sm font-medium text-blue-gray-900 hover:text-blue-gray-700 focus:border-blue-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-gray-50">Remove</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="sm:col-span-6">
                                        <label for="cover_photo" class="block text-sm font-medium text-blue-gray-900">Cover Photo</label>
                                        <div class="mt-1">
                                            @if(is_string($cover_photo))
                                                <img class="inline-block h-32 w-full object-cover lg:h-48" src="{{auth()->user()->cover()}}" alt="{{auth()->user()->name}}">
                                            @elseif(!is_string($cover_photo) )
                                                <img class="inline-block h-32 w-full object-cover lg:h-48" src="{{$cover_photo->temporaryUrl()}}" alt="{{auth()->user()->name}}">
                                            @endif
                                            <x-jet-input-error for="cover_photo" class="mt-1"></x-jet-input-error>
                                        </div>
                                        <div class="mt-2 flex items-center">
                                            <div class=" flex">
                                                <div class="relative flex cursor-pointer items-center rounded-md border border-blue-gray-300 bg-white py-2 px-3 shadow-sm focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-blue-gray-50 hover:bg-blue-gray-50">
                                                    <label for="cover_photo" class="pointer-events-none relative text-sm font-medium text-blue-gray-900">
                                                        <span>Change</span>
                                                    </label>
                                                    <input wire:model="cover_photo" type="file" class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0">
                                                </div>
                                                @if(auth()->user()->cover_photo)
                                                    <button wire:click="removeCover()" type="button" class="ml-3 rounded-md border border-transparent bg-transparent py-2 px-3 text-sm font-medium text-blue-gray-900 hover:text-blue-gray-700 focus:border-blue-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-gray-50">Remove</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="about" class="block text-sm font-medium text-blue-gray-900">About</label>
                                        <div class="mt-1">
                                            <x-input.rich-text wire:model="about"></x-input.rich-text>
                                        </div>
                                        <p class="mt-3 text-sm text-blue-gray-500">Brief description for your profile.</p>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <label for="website" class="block text-sm font-medium text-blue-gray-900">Website</label>
                                        <input wire:model="website" type="text" class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="facebook" class="block text-sm font-medium text-blue-gray-900">Facebook</label>
                                        <input wire:model="facebook" type="text" class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="twitter" class="block text-sm font-medium text-blue-gray-900">Twitter</label>
                                        <input wire:model="twitter" type="text" class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="linkedin" class="block text-sm font-medium text-blue-gray-900">LinkedIn</label>
                                        <input wire:model="linkedin" type="text" class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                    </div>
                                </div>


                                <div class="flex justify-end pt-8">
                                    <x-jet-button type="submit">Save</x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
