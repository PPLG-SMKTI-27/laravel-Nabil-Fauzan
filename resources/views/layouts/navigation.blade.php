<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    @php
        $user = auth()->user();
        $isAdmin = $user->role === 'admin';

        $homeRoute = $isAdmin
            ? route('admin')
            : route('dashboard');

        // Route Projects beda tergantung role
        $projectsRoute = $isAdmin
            ? route('dashboard.projects.index')
            : route('projects');
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ $homeRoute }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <!-- Dashboard -->
                    <x-nav-link 
                        :href="$homeRoute"
                        :active="request()->routeIs('dashboard') || request()->routeIs('admin')">
                        Dashboard
                    </x-nav-link>

                    <!-- Projects -->
                    <x-nav-link 
                        :href="$projectsRoute" 
                        :active="request()->routeIs('dashboard.projects.*') || request()->routeIs('projects')">
                        Projects
                    </x-nav-link>

                    <!-- Portfolio -->
                    <x-nav-link 
                        :href="route('portfolio')" 
                        :active="request()->routeIs('portfolio')">
                        Portfolio
                    </x-nav-link>

                </div>
            </div>

            <!-- Desktop Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 text-sm font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 transition">

                            <span>{{ $user->name }}</span>

                            @if($isAdmin)
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200">
                                    👑 Admin
                                </span>
                            @else
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200">
                                    User
                                </span>
                            @endif

                            <svg class="fill-current h-4 w-4 ms-1" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"/>
                            </svg>

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link 
                :href="$homeRoute"
                :active="request()->routeIs('dashboard') || request()->routeIs('admin')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link 
                :href="$projectsRoute"
                :active="request()->routeIs('dashboard.projects.*') || request()->routeIs('projects')">
                Projects
            </x-responsive-nav-link>

            <x-responsive-nav-link 
                :href="route('portfolio')"
                :active="request()->routeIs('portfolio')">
                Portfolio
            </x-responsive-nav-link>

        </div>

        <!-- Mobile User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 space-y-2">

                <div class="flex items-center gap-2 font-medium text-base text-gray-800 dark:text-gray-200">
                    <span>{{ $user->name }}</span>

                    @if($isAdmin)
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-200">
                            👑 Admin
                        </span>
                    @else
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-200">
                            User
                        </span>
                    @endif
                </div>

                <div class="text-sm text-gray-500">
                    {{ $user->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>
</nav>  