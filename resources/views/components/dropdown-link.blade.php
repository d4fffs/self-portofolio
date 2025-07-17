<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-sm text-left text-white bg-gray-600 
                hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400 
                transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>