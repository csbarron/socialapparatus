<div>
    <x-breadcrumbs :items="[['title'=>'Forum','route'=>\App\Models\Category::first()->getRoute()],['title'=>$category->title,'route'=>$category->getRoute()]]"/>


    @if( $posts->count() >0)
    <ul role="list" class="space-y-4">
        @foreach($posts as $post)
            <livewire:models.post :wire:key="'post_model_'.$post->id" :post="$post"></livewire:models.post>
        @endforeach
    </ul>
        @else
    <x-empty></x-empty>
    @endif
</div>

