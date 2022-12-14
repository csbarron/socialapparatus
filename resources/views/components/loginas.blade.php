@props([
    'user'
])
@if(Auth::check() && (auth()->user()->id == 1) && (auth()->user()->id !== $user->id))
<form method="post" action="{{route('loginas')}}" >
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <x-jet-danger-button type="submit">
        <x-icons.login class="-ml-1 mr-2 h-5 w-5 text-white"></x-icons.login>
        <span>Login As</span>
    </x-jet-danger-button>
</form>
@endif
