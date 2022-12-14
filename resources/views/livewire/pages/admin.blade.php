<div>
    <x-breadcrumbs :items="[['title'=>'Admin','route'=>'admin'],['title'=>'Users','route'=>'admin']]"></x-breadcrumbs>
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <x-admin-tabs></x-admin-tabs>
        <x-jet-input wire:model="q" type="text" class="w-full mb-2" placeholder="Filter..."></x-jet-input>
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($users as $user)
                <li key="user_{{$user->id}}" wire:key="user_{{$user->id}}">
                    <x-models.user key="user_model_{{$user->id}}" :wire:key="'user_'.$user->id" :user="$user"> </x-models.user>
                </li>
            @endforeach
        </ul>
    </div>
</div>
