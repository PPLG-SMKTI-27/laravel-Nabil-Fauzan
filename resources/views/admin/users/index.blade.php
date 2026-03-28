<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Manajemen user
            </h2>
            <a href="{{ route('admin') }}"
               class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                ← Kembali ke admin
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-4 sm:p-6 space-y-6">
                    <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col gap-3 sm:flex-row sm:items-end">
                        <div class="flex-1">
                            <label for="q" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cari nama atau email</label>
                            <input type="search" name="q" id="q" value="{{ $q }}"
                                   placeholder="Ketik lalu Enter…"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                                Cari
                            </button>
                            @if ($q !== '')
                                <a href="{{ route('admin.users.index') }}"
                                   class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-900 dark:text-gray-100">
                            <thead class="border-b border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-400">
                                <tr>
                                    <th class="py-3 pr-4">Nama</th>
                                    <th class="py-3 pr-4">Email</th>
                                    <th class="py-3 pr-4">Role</th>
                                    <th class="py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="py-3 pr-4 font-medium">{{ $user->name }}</td>
                                        <td class="py-3 pr-4">{{ $user->email }}</td>
                                        <td class="py-3 pr-4">
                                            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="inline-flex items-center gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role"
                                                        onchange="this.form.submit()"
                                                        class="rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 text-sm">
                                                    <option value="user" @selected($user->role === 'user')>User</option>
                                                    <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="py-3 text-right">
                                            @if ($user->id !== auth()->id())
                                                <form method="POST"
                                                      action="{{ route('admin.users.destroy', $user) }}"
                                                      class="inline"
                                                      onsubmit="return confirm('Hapus user ini? Proyek miliknya ikut terhapus.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="text-sm text-rose-600 hover:underline dark:text-rose-400">
                                                        Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-xs text-gray-400">(Anda)</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-8 text-center text-gray-500">Tidak ada user.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
