<div class="tentang-wrapper">
  <div class="profile-photo">
    <img 
      src="{{ $image ?? asset('images/profile.png') }}" 
      alt="{{ $alt ?? 'Foto Profil' }}"
    >
  </div>

  <div class="profile-text">
    <h1>{{ $title ?? 'Informasi Singkat' }}</h1>
    <p>
      {{ $slot }}
    </p>
  </div>
</div>
