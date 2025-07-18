<header x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 fixed w-full z-50 text-white">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center px-4 py-3 sm:px-6">
        {{-- Logo --}}
        <a href="{{ Auth::user()->usertype === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
            class="flex items-center space-x-2">
            <x-application-logo class="w-8 h-8" />
        </a>

        {{-- Menu Desktop --}}
        <nav class="hidden md:flex items-center space-x-6 text-sm">
            <x-nav-link :href="Auth::user()->usertype === 'admin' ? route('admin.dashboard') : route('dashboard')" :active="request()->routeIs(Auth::user()->usertype === 'admin' ? 'admin.dashboard' : 'dashboard')" class="hover:text-yellow-400">
                {{ Auth::user()->usertype === 'admin' ? 'Dashboard' : 'Beranda' }}
            </x-nav-link>

            @if (Auth::user()->usertype === 'admin')
                <x-nav-link href="{{ route('admin/products') }}" :active="request()->routeIs('admin/products')" class="hover:text-yellow-400">
                    {{ __('Product') }}
                </x-nav-link>
            @endif

            @if (Auth::user()->usertype === 'user')
                <x-nav-link href="{{ route('navbarang') }}" :active="request()->routeIs('navbarang')" class="hover:text-yellow-400">
                    {{ __('Status') }}
                </x-nav-link>
            @endif
            @if (Auth::user()->usertype === 'admin')
                <x-nav-link href="{{ route('histori') }}" :active="request()->routeIs('histori')" class="hover:text-yellow-400">
                    {{ __('Histori') }}
                </x-nav-link>
            @endif
            <x-nav-link :href="route('profile.edit')" class="hover:text-yellow-400">
                {{ __('Profile') }}
            </x-nav-link>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <x-nav-link href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="hover:text-red-400">
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>
        </nav>

        {{-- Mobile Menu Button --}}
        <div class="md:hidden">
            <button @click="open = !open" class="text-gray-200 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" x-transition class="md:hidden px-4 pb-4 space-y-2 text-sm">
        <x-nav-link :href="Auth::user()->usertype === 'admin' ? route('admin.dashboard') : route('dashboard')" :active="request()->routeIs(Auth::user()->usertype === 'admin' ? 'admin.dashboard' : 'dashboard')"
            class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
            {{ Auth::user()->usertype === 'admin' ? 'Dashboard' : 'Beranda' }}
        </x-nav-link>

        @if (Auth::user()->usertype === 'admin')
            <x-nav-link href="{{ route('admin/products') }}" :active="request()->routeIs('admin/products')"
                class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                {{ __('Product') }}
            </x-nav-link>
        @endif

        @if (Auth::user()->usertype === 'user')
            <x-nav-link href="{{ route('navbarang') }}" :active="request()->routeIs('navbarang')"
                class="block px-4 py-2 rounded hover:bg-gray-700 hover:text-yellow-400">
                {{ __('Barang') }}
            </x-nav-link>
        @endif

        <x-nav-link :href="route('profile.edit')" class="block px-4 py-2 rounded hover:text-yellow-400">
            {{ __('Profile') }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                class="block px-4 py-2 rounded hover:text-red-400">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </div>
</header>
