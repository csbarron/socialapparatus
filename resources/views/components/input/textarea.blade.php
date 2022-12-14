<textarea {{$attributes->merge(['class'=>'block w-full bg-white border border-gray-300 rounded-md py-2 px-3 overflow-y-hidden text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-rose-500 focus:border-rose-500 sm:text-sm'])}} rows="1" x-data x-ref="textarea"
x-init="
    $refs.textarea.style.height = 'auto';
    $refs.textarea.addEventListener('input',autoResize,false);
    function autoResize() {

        $refs.textarea.style.height = $refs.textarea.scrollHeight+'px';
    }
"
></textarea>
