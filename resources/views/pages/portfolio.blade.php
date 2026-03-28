<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($user->bio ?? 'Portfolio pengguna.'), 160) }}">
    <title>Portfolio | {{ $user->name }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        :root {
            --accent: #4fc3f7;
            --dark: #1f1f1f;
            --dark-soft: #2b2b2b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        html { scroll-behavior: smooth; }

        body {
            background: linear-gradient(to bottom, #1f1f1f 0%, #2b2b2b 45%, #ffffff 100%);
            color: #eaeaea;
            min-height: 100vh;
        }

        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(18,18,18,0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .nav-inner {
            max-width: 1200px;
            margin: auto;
            padding: 0 24px;
            min-height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-logo {
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 22px;
            flex-wrap: wrap;
        }

        .nav-links a {
            font-size: 14px;
            color: #ccc;
            text-decoration: none;
            position: relative;
            transition: 0.3s;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .nav-user {
            font-size: 13px;
            color: #bbb;
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .nav-logout {
            font-size: 13px;
            background: none;
            border: none;
            color: #ff6b6b;
            cursor: pointer;
        }

        .nav-logout:hover {
            text-decoration: underline;
        }

        .nav-toggle {
            display: none;
            background: none;
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .nav-mobile {
            flex-direction: column;
            display: flex;
            gap: 12px;
            padding: 16px 24px 20px;
            border-top: 1px solid rgba(255,255,255,0.08);
            background: rgba(12,12,12,0.95);
        }

        .nav-mobile a {
            color: #ccc;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-mobile a:hover {
            color: var(--accent);
        }

        .container {
            max-width: 1000px;
            width: 90%;
            margin: auto;
            padding: 140px 0 80px;
        }

        section {
            margin-bottom: 70px;
            animation: fadeUp 0.9s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .white-area {
            background: #ffffff;
            color: #222;
            border-radius: 22px 22px 0 0;
            box-shadow: 0 -15px 40px rgba(0,0,0,0.15);
            padding-bottom: 60px;
        }

        .tentang-wrapper {
            display: flex;
            align-items: center;
            gap: 35px;
            flex-wrap: wrap;
        }

        .tentang-wrapper h1 {
            font-size: 1.75rem;
            margin-bottom: 12px;
        }

        .profile-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), #1976d2);
            padding: 4px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.45);
            flex-shrink: 0;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 12px;
        }

        .skill-item {
            background: var(--dark);
            color: #fff;
            padding: 10px 18px;
            border-radius: 22px;
            font-size: 13px;
        }

        .white-area h2 {
            margin-bottom: 12px;
        }

        .white-area section p {
            line-height: 1.65;
            color: #444;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 16px;
        }

        .project-card {
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            padding: 18px;
            background: #fafafa;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .project-card h3 {
            font-size: 1.05rem;
            color: #111;
        }

        .project-card .tech {
            font-size: 12px;
            color: #666;
        }

        .project-card .desc {
            font-size: 14px;
            color: #444;
            flex: 1;
        }

        .project-card a.link {
            font-size: 14px;
            color: #1976d2;
            text-decoration: none;
            font-weight: 600;
        }

        .project-card a.link:hover {
            text-decoration: underline;
        }

        .muted {
            color: #888;
            font-size: 14px;
        }

        .hint {
            margin-top: 10px;
            font-size: 14px;
        }

        .hint a {
            color: var(--accent);
        }

        footer {
            background: #121212;
            color: #aaa;
            text-align: center;
            padding: 26px 0;
            font-size: 13px;
        }

        .nav-logout-desktop {
            display: block;
        }

        @media (min-width: 769px) {
            .nav-mobile-drawer {
                display: none !important;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .nav-toggle {
                display: block;
            }

            .nav-logout-desktop {
                display: none;
            }
        }
    </style>
</head>

<body>

<nav x-data="{ open: false }">
    <div class="nav-inner">
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo">PORTFOLIO</a>

            <div class="nav-links">
                <a href="#tentang">Tentang</a>
                <a href="#keahlian">Keahlian</a>
                <a href="#proyek-saya">Proyek</a>
                <a href="{{ route('dashboard.projects.index') }}">Projects</a>
                <a href="{{ route('projects') }}">Galeri publik</a>
            </div>
        </div>

        <div class="nav-right">
            <span class="nav-user">{{ $user->name }}</span>

            <button type="button" class="nav-toggle" @click="open = !open" aria-label="Menu">☰</button>

            <form method="POST" action="{{ route('logout') }}" class="nav-logout-desktop">
                @csrf
                <button type="submit" class="nav-logout">Logout</button>
            </form>
        </div>
    </div>

    <div class="nav-mobile nav-mobile-drawer" x-show="open" x-transition x-cloak>
        <a href="#tentang" @click="open = false">Tentang</a>
        <a href="#keahlian" @click="open = false">Keahlian</a>
        <a href="#proyek-saya" @click="open = false">Proyek</a>
        <a href="{{ route('dashboard.projects.index') }}">Projects</a>
        <a href="{{ route('projects') }}">Galeri publik</a>
        <a href="{{ route('profile.edit') }}">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-logout" style="padding: 0;">Logout</button>
        </form>
    </div>
</nav>

@php
    $bioText = $user->bio;
    $defaultBio = 'Belum ada bio. Tambahkan di menu Profil agar tampil di halaman ini.';
    $skillsList = is_array($user->skills) ? $user->skills : [];
@endphp

<div class="container">
    <section id="tentang">
        <div class="tentang-wrapper">
            <div class="profile-photo">
                <img src="{{ asset('images/profile.png') }}" alt="Foto profil">
            </div>
            <div>
                <h1>{{ $user->name }}</h1>
                <p>{{ $bioText ? $bioText : $defaultBio }}</p>
                <p class="hint">
                    <a href="{{ route('profile.edit') }}">Ubah bio &amp; keahlian di Profil</a>
                </p>
            </div>
        </div>
    </section>
</div>

<div class="white-area">
    <div class="container">

        <section id="keahlian">
            <h2>Keahlian</h2>
            @if (count($skillsList) > 0)
                <div class="skills">
                    @foreach ($skillsList as $skill)
                        <div class="skill-item">{{ $skill }}</div>
                    @endforeach
                </div>
            @else
                <p class="muted">Belum ada keahlian yang diisi. Tambahkan di halaman Profil (pisahkan dengan koma).</p>
            @endif
        </section>

        <section id="proyek-saya">
            <h2>Proyek saya</h2>
            <p class="muted" style="margin-bottom: 16px;">Data dari proyek di menu <strong>Projects</strong> (CRUD). <a href="{{ route('dashboard.projects.index') }}" style="color:#1976d2;">Kelola proyek</a></p>

            <div class="project-grid">
                @forelse ($portfolioProjects as $project)
                    <article class="project-card">
                        <h3>{{ $project->title }}</h3>
                        <p class="tech">{{ collect($project->tech)->implode(' · ') }}</p>
                        <p class="desc">{{ \Illuminate\Support\Str::limit(strip_tags($project->description), 160) }}</p>
                        @if ($project->link)
                            <a class="link" href="{{ $project->link }}" target="_blank" rel="noopener noreferrer">Lihat proyek →</a>
                        @endif
                    </article>
                @empty
                    <p class="muted">Belum ada proyek. <a href="{{ route('dashboard.projects.create') }}" style="color:#1976d2;">Tambah proyek</a></p>
                @endforelse
            </div>
        </section>

    </div>
</div>

<footer>
    <p>&copy; {{ date('Y') }} | Portfolio • {{ $user->name }}</p>
</footer>

</body>
</html>
