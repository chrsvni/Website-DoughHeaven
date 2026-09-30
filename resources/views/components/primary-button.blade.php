<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-3 bg-pink-600 border border-transparent rounded-xl font-semibold text-sm text-white tracking-wide hover:bg-pink-700 focus:bg-pink-700 active:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-200 shadow-md shadow-pink-500/20']) }}>
    {{ $slot }}
</button>
