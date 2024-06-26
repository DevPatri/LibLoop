<nav x-data="{ open: false }" class="bg-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo and Title -->
                <div class="flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-12 w-auto fill-current text-gray-800" />
                    </a>
                    <span class="ml-3 text-2xl font-light" style="font-family: Verdana; color: #386641;">LibLoop</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex sm:ml-auto">
                <a href="{{ route('index') }}" class="custom-nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                    {{ __('Inicio') }}
                </a>
                <a href="{{ route('explore') }}" class="custom-nav-link {{ request()->routeIs('explore') ? 'active' : '' }}">
                    {{ __('Libros') }}
                </a>
                <a href="{{ route('contacto') }}" class="custom-nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}">
                    {{ __('Contacto') }}
                </a>
                @if (Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="font-medium text-base" style="color:#BC4749">{{ Auth::user()->nombre }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="custom-nav-link">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')" class="custom-nav-link">
                                {{ __('Panel de usuario') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('mensajes.index')" class="custom-nav-link">
                                {{ __('Mensajes') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="custom-nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="custom-nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                        {{ __('Iniciar sesión') }}
                    </a>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('index') }}" class="custom-nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                {{ __('Inicio') }}
            </a>
            <a href="{{ route('explore') }}" class="custom-nav-link {{ request()->routeIs('explore') ? 'active' : '' }}">
                {{ __('Libros') }}
            </a>
            <a href="{{ route('contacto') }}" class="custom-nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}">
                {{ __('Contacto') }}
            </a>
            @if (Auth::check())
                <a href="{{ route('profile.edit') }}" class="custom-nav-link">
                    {{ __('Profile') }}
                </a>
                <a href="{{ route('dashboard') }}" class="custom-nav-link">
                    {{ __('Panel de usuario') }}
                </a>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="custom-nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            @else
                <a href="{{ route('login') }}" class="custom-nav-link">
                    {{ __('Iniciar sesión') }}
                </a>
            @endif
        </div>
    </div>
</nav>

<style>
    .custom-nav-link {
        text-decoration: none !important;
        font-family: Verdana, sans-serif;
        font-weight: normal;
        padding: 8px;
        color: #386641;
        transition: color 0.3s, font-weight 0.3s, transform 0.3s;
        border-bottom: 2px solid transparent;
    }

    .custom-nav-link:hover {
        text-decoration: none !important;
        color: #BC4749;
        border-bottom: 2px solid transparent;
        transform: scale(1.1); /* Efecto de zoom */
    }

    .custom-nav-link.active {
        color: #BC4749;
        border-bottom: none !important;
    }
</style>
