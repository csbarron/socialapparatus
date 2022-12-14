<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-1 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-900 focus:outline-none focus:border-orange-900 focus:ring focus:ring-orange-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
