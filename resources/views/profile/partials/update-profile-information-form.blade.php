<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label value="Foto profil" />
            <div class="mt-2 flex flex-col gap-4 sm:flex-row sm:items-start">
                <img src="{{ $user->avatarUrl() }}" alt="Foto profil" class="h-24 w-24 shrink-0 rounded-full object-cover ring-2 ring-gray-200 dark:ring-gray-600">
                <div class="flex-1 space-y-3">
                    <input type="file" name="avatar" id="avatar" accept="image/jpeg,image/png,image/gif,image/webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-indigo-900/40 dark:file:text-indigo-200">
                    <p class="text-xs text-gray-500 dark:text-gray-400">JPEG, PNG, GIF, atau WebP. Maks. 2 MB.</p>
                    <x-input-error :messages="$errors->get('avatar')" class="mt-1" />
                    @if ($user->avatar_path)
                        <label class="inline-flex items-center gap-2 text-sm text-gray-600 dark:text-gray-300">
                            <input type="checkbox" name="remove_avatar" value="1" class="rounded border-gray-300 text-indigo-600 dark:border-gray-600 dark:bg-gray-900">
                            Hapus foto unggahan (kembali ke gambar default)
                        </label>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="bio" value="Bio singkat (untuk portfolio)" />
            <textarea id="bio" name="bio" rows="4"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                placeholder="Ceritakan singkat tentang Anda...">{{ old('bio', $user->bio ?? '') }}</textarea>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Ditampilkan di halaman Portfolio.</p>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="skills" value="Keahlian (pisahkan dengan koma)" />
            <x-text-input id="skills" name="skills" type="text" class="mt-1 block w-full"
                :value="old('skills', isset($user->skills) && is_array($user->skills) ? implode(', ', $user->skills) : '')"
                placeholder="Contoh: HTML, CSS, Laravel" autocomplete="off" />
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
