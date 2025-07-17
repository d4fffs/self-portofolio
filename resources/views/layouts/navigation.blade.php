<div x-data="{ open: false }" class="bg-gray-900 text-white min-h-screen">
    {{-- Sidebar Desktop (Fixed) --}}
    <aside class="fixed top-0 left-0 w-64 h-screen bg-gray-800 border-r border-gray-700 hidden sm:flex flex-col z-40">
        {{-- Logo --}}
        <div class="h-20 flex items-center justify-center border-b border-gray-700">
            <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                <x-application-logo class="w-10 h-10" />
            </a>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-4 py-6 flex flex-col space-y-2 text-sm">
            <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')"
                :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')"
                class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                {{ Auth::user()->usertype == 'admin' ? 'Dashboard' : 'Beranda' }}
            </x-nav-link>

            @if (Auth::user()->usertype == 'admin')
                <x-nav-link href="{{ route('admin/products') }}" :active="request()->routeIs('admin/products')"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                    {{ __('Product') }}
                </x-nav-link>
            @endif

            @if (Auth::user()->usertype == 'user')
                <x-nav-link href="{{ route('navbarang') }}" :active="request()->routeIs('navbarang')"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                    {{ __('Barang') }}
                </x-nav-link>
            @endif
        </nav>

        {{-- Footer Info --}}
        <div class="border-t border-gray-700 px-4 py-4">
            <p class="font-semibold">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
            <div class="mt-4 space-y-1 text-sm">
                <x-nav-link :href="route('profile.edit')" class="hover:text-yellow-400">
                    {{ __('Profile') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="hover:text-red-400">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>
        </div>
    </aside>

    {{-- Mobile Menu Button --}}
    <div class="sm:hidden fixed top-0 left-0 z-50 p-4">
        <button @click="open = !open"
            class="text-white bg-gray-700 p-2 rounded-md hover:bg-gray-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Sidebar Mobile --}}
    <div x-show="open" x-transition
        class="sm:hidden fixed top-0 left-0 w-64 h-screen z-40 bg-gray-800 border-r border-gray-700 p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="w-8 h-8" />
            </a>
            <button @click="open = false" class="text-gray-300 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <nav class="space-y-2 text-sm">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                {{ __('Dashboard') }}
            </x-nav-link>

            @if (Auth::user()->usertype == 'admin')
                <x-nav-link href="{{ route('admin/products') }}" :active="request()->routeIs('admin/products')"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                    {{ __('Product') }}
                </x-nav-link>
            @endif

            @if (Auth::user()->usertype == 'user')
                <x-nav-link href="{{ route('navbarang') }}" :active="request()->routeIs('navbarang')"
                    class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                    {{ __('Barang') }}
                </x-nav-link>
            @endif

            <x-nav-link :href="route('profile.edit')" class="hover:text-yellow-400 block px-4 py-2 rounded">
                {{ __('Profile') }}
            </x-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:text-red-400 block px-4 py-2 rounded">
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>
        </nav>
    </div>

    {{-- Main Content Area --}}
    <div class="sm:ml-64">
        <div class="min-h-screen p-6">
            {{ $slot }}
        </div>
    </div>
</div>