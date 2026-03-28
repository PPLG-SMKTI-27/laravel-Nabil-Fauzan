<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                    Selamat datang kembali, {{ Auth::user()->name }}
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Ringkasan aktivitas dan proyek Anda.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <p class="text-sm uppercase tracking-wide text-gray-400 dark:text-gray-500">
                        Proyek Anda
                    </p>
                    <div class="mt-4 flex flex-wrap items-end gap-3">
                        <span class="text-5xl font-bold text-gray-900 dark:text-white">
                            {{ $myProjects }}
                        </span>
                        <span class="text-gray-500 dark:text-gray-400 mb-2">
                            total dibuat
                        </span>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('dashboard.projects.index') }}"
                           class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-indigo-700">
                            Kelola proyek
                        </a>
                        <a href="{{ route('dashboard.projects.create') }}"
                           class="inline-flex items-center justify-center rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            Tambah proyek
                        </a>
                        <a href="{{ route('projects') }}"
                           class="inline-flex items-center justify-center rounded-md text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline">
                            Lihat semua proyek (publik)
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <p class="text-sm uppercase tracking-wide text-gray-400 dark:text-gray-500">
                        Portfolio
                    </p>
                    <p class="mt-4 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Halaman portfolio menampilkan bio, keahlian, dan proyek Anda. Edit bio &amp; keahlian di Profil.
                    </p>
                    <a href="{{ route('portfolio') }}"
                       class="mt-6 inline-flex items-center justify-center rounded-md bg-slate-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-500">
                        Buka portfolio
                    </a>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 sm:p-8 border-b border-gray-100 dark:border-gray-700 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Proyek terbaru
                    </h2>
                    <a href="{{ route('dashboard.projects.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        Lihat semua di manajemen
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-900/50 text-gray-600 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 font-medium">Judul</th>
                                <th class="px-6 py-3 font-medium hidden sm:table-cell">Tech</th>
                                <th class="px-6 py-3 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($recentProjects as $project)
                                <tr class="text-gray-800 dark:text-gray-200">
                                    <td class="px-6 py-3">{{ $project->title }}</td>
                                    <td class="px-6 py-3 hidden sm:table-cell text-gray-500 dark:text-gray-400">
                                        {{ collect($project->tech)->implode(', ') }}
                                    </td>
                                    <td class="px-6 py-3 text-right">
                                        <a href="{{ route('dashboard.projects.edit', $project) }}"
                                           class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada proyek. <a href="{{ route('dashboard.projects.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Buat proyek pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
