<form {{$attributes}} method="post" action="{{route($route)}}"
    x-data="{
            showconfirm:false,
            countdown:5,
            toggleShowConfirm() {

                    this.showconfirm=true;
                    var checker = setInterval(() => {
                        this.countdown --;
                        if (this.countdown === 0) {
                            clearInterval(checker);
                            this.showconfirm=false;
                            this.countdown = 5;
                        }
                    }, 1000);

            }
        }">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <x-jet-danger-button type="button" x-show="!showconfirm" @click="toggleShowConfirm()">
        <x-icons.trash class="text-white w-4 h-4"></x-icons.trash>
    </x-jet-danger-button>
    <x-jet-danger-button type="submit"  x-show="showconfirm" x-cloak x-text="countdown"></x-jet-danger-button>
</form>
