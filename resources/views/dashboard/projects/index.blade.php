<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-white leading-tight">
                Projects
            </h2>
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-3">
                <a href="{{ route('projects') }}"
                   class="inline-flex w-full items-center justify-center rounded-md border border-gray-400/50 px-4 py-2 text-sm text-white/90 transition hover:bg-white/10 sm:w-auto">
                    Lihat semua proyek (publik)
                </a>
                <a href="{{ route('dashboard.projects.create') }}"
                   class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700 sm:w-auto">
                    Tambah Project
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-4 sm:p-6">
                    @if (session('success'))
                        <div class="mb-4 rounded-md bg-emerald-100 text-emerald-800 px-4 py-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Desktop: tabel --}}
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-left border-collapse text-white">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th class="py-3 pr-4">Judul</th>
                                    <th class="py-3 pr-4">Tech Stack</th>
                                    <th class="py-3 pr-4">Link</th>
                                    <th class="py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $project)
                                    <tr class="border-b border-gray-100 dark:border-gray-700">
                                        <td class="py-3 pr-4">{{ $project->title }}</td>
                                        <td class="py-3 pr-4">
                                            {{ collect($project->tech)->implode(', ') }}
                                        </td>
                                        <td class="py-3 pr-4">
                                            @if ($project->link)
                                                <a href="{{ $project->link }}"
                                                   target="_blank"
                                                   rel="noopener noreferrer"
                                                   class="text-indigo-400 hover:underline">
                                                    Buka
                                                </a>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3 text-right">
                                            <a href="{{ route('dashboard.projects.edit', $project) }}"
                                               class="inline-block px-3 py-1.5 bg-amber-500 text-white rounded hover:bg-amber-600 transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('dashboard.projects.destroy', $project) }}"
                                                  method="POST"
                                                  class="inline-block"
                                                  onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1.5 bg-rose-600 text-white rounded hover:bg-rose-700 transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 text-center text-gray-300">Belum ada data project.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Mobile: kartu (CRUD tetap tampil) --}}
                    <div class="md:hidden space-y-4">
                        @forelse ($projects as $project)
                            <div class="rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-900/50 p-4 text-gray-100">
                                <h3 class="font-semibold text-white">{{ $project->title }}</h3>
                                <p class="mt-1 text-sm text-gray-400">
                                    {{ collect($project->tech)->implode(', ') }}
                                </p>
                                @if ($project->link)
                                    <a href="{{ $project->link }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="mt-2 inline-block text-sm text-indigo-400 hover:underline">
                                        Buka tautan
                                    </a>
                                @endif
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <a href="{{ route('dashboard.projects.edit', $project) }}"
                                       class="inline-flex flex-1 min-w-[6rem] justify-center rounded-md bg-amber-500 px-3 py-2 text-sm font-medium text-white hover:bg-amber-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('dashboard.projects.destroy', $project) }}"
                                          method="POST"
                                          class="inline-flex flex-1 min-w-[6rem]"
                                          onsubmit="return confirm('Yakin ingin menghapus project ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full rounded-md bg-rose-600 px-3 py-2 text-sm font-medium text-white hover:bg-rose-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="py-6 text-center text-gray-400">Belum ada data project.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
