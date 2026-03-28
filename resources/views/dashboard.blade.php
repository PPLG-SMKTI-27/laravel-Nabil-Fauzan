@php
    use Illuminate\Support\Carbon;
    $greeting = Carbon::now()->locale('id')->translatedFormat('l, d F Y');
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8 sm:py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Hero --}}
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-indigo-600 via-violet-600 to-indigo-800 px-6 py-8 sm:px-10 sm:py-10 shadow-lg shadow-indigo-500/20">
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-white/10 blur-3xl"></div>
                <div class="absolute -bottom-20 -left-10 h-40 w-40 rounded-full bg-violet-400/20 blur-2xl"></div>
                <div class="relative">
                    <p class="text-sm font-medium text-indigo-100/90">{{ $greeting }}</p>
                    <h1 class="mt-2 text-2xl font-bold tracking-tight text-white sm:text-3xl">
                        Halo, {{ Auth::user()->name }}
                    </h1>
                    <p class="mt-2 max-w-xl text-sm text-indigo-100/90 sm:text-base">
                        @if ($isAdmin)
                            Anda login sebagai <span class="font-semibold text-white">admin</span> — melihat ringkasan semua proyek di sistem.
                        @else
                            Ringkasan proyek dan pintasan ke halaman yang sering dipakai.
                        @endif
                    </p>
                    @if ($isAdmin)
                        <a href="{{ route('admin') }}"
                           class="mt-5 inline-flex items-center gap-2 rounded-lg bg-white/15 px-4 py-2 text-sm font-medium text-white backdrop-blur transition hover:bg-white/25">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            Panel admin
                        </a>
                    @endif
                </div>
            </div>

            {{-- Stat --}}
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="group flex items-start gap-4 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:border-indigo-200 hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:border-indigo-500/40">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600 dark:bg-indigo-900/50 dark:text-indigo-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-3.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">
                            {{ $isAdmin ? 'Total proyek (sistem)' : 'Proyek Anda' }}
                        </p>
                        <p class="mt-1 text-3xl font-bold tabular-nums text-gray-900 dark:text-white">{{ $myProjects }}</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            {{ $isAdmin ? 'Seluruh entri di database' : 'Yang terdaftar atas nama Anda' }}
                        </p>
                    </div>
                </div>

                <div class="group flex items-start gap-4 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:border-emerald-200 hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:border-emerald-500/40">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600 dark:bg-emerald-900/50 dark:text-emerald-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75v-6z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Aksi cepat</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">Kelola proyek</p>
                        <a href="{{ route('dashboard.projects.index') }}" class="mt-2 inline-flex text-sm font-medium text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300">
                            Buka manajemen →
                        </a>
                    </div>
                </div>

                <div class="group flex items-start gap-4 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition hover:border-violet-200 hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:border-violet-500/40 sm:col-span-2 lg:col-span-1">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-violet-100 text-violet-600 dark:bg-violet-900/50 dark:text-violet-300">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Profil &amp; portfolio</p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Bio, keahlian, dan tampilan publik.</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <a href="{{ route('profile.edit') }}" class="inline-flex rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-800 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                Profil
                            </a>
                            <a href="{{ route('portfolio') }}" class="inline-flex rounded-lg bg-violet-100 px-3 py-1.5 text-xs font-medium text-violet-800 hover:bg-violet-200 dark:bg-violet-900/40 dark:text-violet-200 dark:hover:bg-violet-900/60">
                                Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pintasan --}}
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">Pintasan</h2>
                <div class="mt-3 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('dashboard.projects.index') }}" class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-indigo-300 hover:shadow dark:border-gray-700 dark:bg-gray-800 dark:hover:border-indigo-500/50">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600 dark:bg-indigo-900/40 dark:text-indigo-300">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        </span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Projects (CRUD)</span>
                    </a>
                    <a href="{{ route('dashboard.projects.create') }}" class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-indigo-300 hover:shadow dark:border-gray-700 dark:bg-gray-800 dark:hover:border-indigo-500/50">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 dark:bg-emerald-900/40 dark:text-emerald-300">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Tambah proyek</span>
                    </a>
                    <a href="{{ route('projects') }}" class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-indigo-300 hover:shadow dark:border-gray-700 dark:bg-gray-800 dark:hover:border-indigo-500/50">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-sky-50 text-sky-600 dark:bg-sky-900/40 dark:text-sky-300">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">Galeri publik</span>
                    </a>
                    @if ($isAdmin)
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-indigo-300 hover:shadow dark:border-gray-700 dark:bg-gray-800 dark:hover:border-indigo-500/50">
                            <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-rose-50 text-rose-600 dark:bg-rose-900/40 dark:text-rose-300">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </span>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">Manajemen user</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Tabel terbaru --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex flex-col gap-2 border-b border-gray-100 px-6 py-5 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Proyek terbaru</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Maksimal 5 entri terakhir</p>
                    </div>
                    <a href="{{ route('dashboard.projects.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                        Lihat semua
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[320px] text-left text-sm">
                        <thead class="bg-gray-50/80 text-gray-600 dark:bg-gray-900/50 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 font-medium">Judul</th>
                                <th class="px-6 py-3 font-medium hidden sm:table-cell">Tech</th>
                                <th class="px-6 py-3 font-medium text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($recentProjects as $project)
                                <tr class="text-gray-800 dark:text-gray-200">
                                    <td class="px-6 py-4 font-medium">{{ $project->title }}</td>
                                    <td class="px-6 py-4 hidden sm:table-cell text-gray-500 dark:text-gray-400">
                                        {{ collect($project->tech)->implode(', ') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('dashboard.projects.edit', $project) }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada proyek.
                                        <a href="{{ route('dashboard.projects.create') }}" class="font-medium text-indigo-600 hover:underline dark:text-indigo-400">Buat yang pertama</a>
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
