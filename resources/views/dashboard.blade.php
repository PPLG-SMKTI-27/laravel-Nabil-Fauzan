<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                    Welcome back, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-500 mt-2">
                    Here’s a quick overview of your activity.
                </p>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <p class="text-sm uppercase tracking-wide text-gray-400">
                    Your Projects
                </p>

                <div class="mt-4 flex items-end gap-3">
                    <span class="text-5xl font-bold text-gray-900 dark:text-white">
                        {{ $myProjects }}
                    </span>
                    <span class="text-gray-500 mb-2">
                        total created
                    </span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>