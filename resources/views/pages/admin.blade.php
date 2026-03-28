<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Header -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Admin Dashboard
                </h1>
                <p class="text-gray-500 text-sm">
                    Overview sistem saat ini
                </p>
            </div>

            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Total Users -->
                <a href="{{ route('admin.users.index') }}" class="block bg-white shadow-md rounded-2xl p-6 hover:shadow-xl transition duration-300 ring-1 ring-transparent hover:ring-blue-200">
                    <p class="text-gray-500 text-sm">Total Users</p>
                    <h2 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $totalUsers ?? 0 }}
                    </h2>
                    <p class="text-xs text-gray-400 mt-3">Klik untuk manajemen user</p>
                </a>

                <!-- Total Projects -->
                <a href="{{ route('dashboard.projects.index') }}" class="block bg-white shadow-md rounded-2xl p-6 hover:shadow-xl transition duration-300 ring-1 ring-transparent hover:ring-green-200">
                    <p class="text-gray-500 text-sm">Total Projects</p>
                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $totalProjects ?? 0 }}
                    </h2>
                    <p class="text-xs text-gray-400 mt-3">Klik untuk kelola semua proyek</p>
                </a>

            </div>

            <!-- Data Terbaru -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Latest Users -->
                <div class="bg-white shadow-md rounded-2xl p-6">
                    <h3 class="font-semibold text-gray-700 mb-4">
                        User Terbaru
                    </h3>

                    @forelse($latestUsers ?? [] as $user)
                        <div class="flex justify-between items-center border-b py-2">
                            <span class="text-gray-800">
                                {{ $user->name }}
                            </span>
                            <span class="text-gray-400 text-sm">
                                {{ $user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm">
                            Belum ada user terdaftar.
                        </p>
                    @endforelse
                </div>

                <!-- Latest Projects -->
                <div class="bg-white shadow-md rounded-2xl p-6">
                    <h3 class="font-semibold text-gray-700 mb-4">
                        Project Terbaru
                    </h3>

                    @forelse($latestProjects ?? [] as $project)
                        <div class="flex justify-between items-center border-b py-2">
                            <span class="text-gray-800">
                                {{ $project->title }}
                            </span>
                            <span class="text-gray-400 text-sm">
                                {{ $project->created_at->format('d M Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm">
                            Belum ada project dibuat.
                        </p>
                    @endforelse
                </div>

            </div>

        </div>
    </div>
</x-app-layout>