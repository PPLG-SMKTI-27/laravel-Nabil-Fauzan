@if (session('success') || session('error') || session('warning'))
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4 space-y-2"
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 8000)"
        x-cloak
    >
        @if (session('success'))
            <div
                role="alert"
                class="rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900 dark:border-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-100"
            >
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div
                role="alert"
                class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-900 dark:border-red-800 dark:bg-red-900/30 dark:text-red-100"
            >
                {{ session('error') }}
            </div>
        @endif

        @if (session('warning'))
            <div
                role="alert"
                class="rounded-md border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-900 dark:border-amber-800 dark:bg-amber-900/30 dark:text-amber-100"
            >
                {{ session('warning') }}
            </div>
        @endif
    </div>
@endif
