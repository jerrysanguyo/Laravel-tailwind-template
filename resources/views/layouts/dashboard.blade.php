<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: true, sidebarCollapsed: false }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/4f2d7302b1.js" crossorigin="anonymous"></script>
    <title>Laravel tailwin template</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="fixed inset-0 z-20 bg-black/50 bg-opacity-50 transition-opacity lg:hidden"
        :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false">
    </div>

    <div class="flex h-screen overflow-hidden">
        <aside
            class="fixed inset-y-0 left-0 z-30 bg-white shadow-lg transform transition-transform duration-200 ease-in-out flex flex-col"
            :class="{'-translate-x-full': !sidebarOpen, 'w-18': sidebarCollapsed, 'w-64': !sidebarCollapsed}">

            <div class="flex items-center justify-center h-16 border-b border-gray-200">
                <span x-show="!sidebarCollapsed" x-cloak class="font-bold text-xl">Laravel Starter Kit</span>
                <span x-show="sidebarCollapsed" x-cloak class="font-bold text-xl">LSK</span>
            </div>

            <nav class="p-4 space-y-2">
                <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 transition">
                    <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-table-columns"></i> Dashboard</span>
                    <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-table-columns"></i></span>
                </a>
                
                <div x-data="{ cmsOpen: false }" class="block">
                    <button @click="cmsOpen = !cmsOpen"
                        class="w-full text-left py-2 px-3 rounded hover:bg-gray-200 transition focus:outline-none">
                        <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-toolbox"></i> Cms</span>
                        <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-toolbox"></i></span>
                        <svg x-show="!sidebarCollapsed" x-cloak
                            class="w-4 h-4 inline ml-2 transform transition-transform duration-200"
                            :class="{'rotate-180': cmsOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="cmsOpen" x-cloak class="pl-4 mt-2 space-y-2">
                        <a href="{{ route('table') }}" class="block py-2 px-3 rounded hover:bg-gray-200 transition">
                            <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-font-awesome"></i> Table</span>
                            <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-font-awesome"></i></span>
                        </a>
                        <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 transition">
                            <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-font-awesome"></i> Ingredient</span>
                            <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-font-awesome"></i></span>
                        </a>
                    </div>
                </div>
                
                <a href="#" class="block py-2 px-3 rounded hover:bg-gray-200 transition">
                    <span x-show="!sidebarCollapsed" x-cloak class="font-medium">Something</span>
                    <span x-show="sidebarCollapsed" x-cloak class="font-medium">S</span>
                </a>
            </nav>
            
            <div class="mt-auto p-4 border-t border-gray-200" x-data="{ userDropdownOpen: false }">
                <div class="relative">
                    <button @click="userDropdownOpen = !userDropdownOpen"
                        class="w-full flex items-center justify-between py-2 px-3 rounded hover:bg-gray-200 transition focus:outline-none">
                        <span x-show="!sidebarCollapsed" x-cloak class="font-medium">Jerry Sanguyo Jr.</span>
                        <span x-show="sidebarCollapsed" x-cloak class="font-medium">Js</span>
                        <svg x-show="!sidebarCollapsed" x-cloak class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15l-7-7-7 7" />
                        </svg>
                    </button>
                    <div x-show="userDropdownOpen" x-cloak x-transition
                        class="absolute left-0 bottom-full mb-2 w-full bg-gray-100 shadow-md rounded z-10">
                        <a href="#" class="block py-2 px-3 hover:bg-gray-200 transition">
                            <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-gear"></i> Settings</span>
                            <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-gear"></i></span>
                        </a>
                        <a href="#" class="block py-2 px-3 hover:bg-gray-200 transition">
                            <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-user"></i> Profile</span>
                            <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-user"></i></span>
                        </a>
                        <a href="#" class="block py-2 px-3 hover:bg-gray-200 transition">
                            <span x-show="!sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-right-from-bracket"></i> Logout</span>
                            <span x-show="sidebarCollapsed" x-cloak class="font-medium"><i class="fa-solid fa-right-from-bracket"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col transition-all duration-200"
            :class="sidebarCollapsed ? 'lg:ml-18' : 'lg:ml-64'">
            <header class="flex items-center bg-white shadow px-4 h-16">
                <button class="mr-2 text-gray-600 focus:outline-none"
                    @click="(window.innerWidth >= 1024) ? sidebarCollapsed = !sidebarCollapsed : sidebarOpen = !sidebarOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </header>
            
            <main class="p-4 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>