<div x-data="{
    editing:@entangle('editing')
    }"
     @keyup.window.escape="editing=0"
>
    <x-breadcrumbs :items="[['title'=>'Admin','route'=>'admin'],['title'=>'General Settings','route'=>'admin.general']]"></x-breadcrumbs>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <x-admin-tabs></x-admin-tabs>



        <form wire:submit.prevent="save" class="divide-y-blue-gray-200 mt-6 space-y-8 divide-y">
            <div class="  gap-y-6 ">


                <div class="mb-4">
                    <label class="block text-sm font-medium text-blue-gray-900">Site name</label>
                    <input wire:model="site_name" type="text" class="mt-1 block w-full rounded-md border-blue-gray-300 text-blue-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <x-jet-input-error class="mt-1" for="site_name"></x-jet-input-error>
                </div>





                <div class="mb-4">
                    <label for="site_description"  class="block text-sm font-medium text-blue-gray-900">Site Description</label>
                    <div class="mt-1">
                        <textarea wire:model="site_description" rows="4" class="block w-full rounded-md border-blue-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                        <x-jet-input-error class="mt-1" for="description"></x-jet-input-error>
                    </div>
                </div>
                <div class="mb-4">
                    <label  class="block text-sm font-medium text-blue-gray-900">Keywords <small>Seperated by commas</small></label>
                    <div class="mt-1">
                        <textarea wire:model="keywords" rows="4" class="block w-full rounded-md border-blue-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                        <x-jet-input-error class="mt-1" for="keywords"></x-jet-input-error>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="home_page" class="block text-sm font-medium text-blue-gray-900">Home page</label>
                    <div class="mt-1">
                        <x-input.rich-text wire:model="home_page"></x-input.rich-text>
                        <x-jet-input-error for="home_page"></x-jet-input-error>
                    </div>
                </div>

            </div>


            <div class="flex justify-end gap-2 pt-8">
                <a href="{{route('admin')}}">
                    <x-warning-button type="button">Cancel</x-warning-button>
                </a>
                <x-success-button type="submit">Save</x-success-button>
            </div>
        </form>




    </div>
</div>
