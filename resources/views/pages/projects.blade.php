<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek | Ojan</title>

    <style>
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

        body {
            background: linear-gradient(to bottom, #1f1f1f 0%, #2b2b2b 45%, #ffffff 100%);
            color: #eaeaea;
            min-height: 100vh;
        }

        /* ===== NAVBAR ===== */
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
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .nav-logo {
            font-weight: 700;
            letter-spacing: 1px;
            color: #fff;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 26px;
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
            gap: 18px;
        }

        .nav-user {
            font-size: 13px;
            color: #bbb;
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

        /* ===== LAYOUT ===== */
        .container {
            max-width: 1000px;
            width: 90%;
            margin: auto;
            padding: 140px 0 80px;
        }

        section {
            margin-bottom: 60px;
        }

        .white-area {
            background: #ffffff;
            color: #222;
            border-radius: 22px 22px 0 0;
            box-shadow: 0 -15px 40px rgba(0,0,0,0.15);
            padding-bottom: 60px;
        }

        /* ===== PROJECTS ===== */
        .project-card {
            background: rgba(255,255,255,0.05);
            padding: 28px;
            border-radius: 18px;
            margin-bottom: 30px;
            transition: 0.3s;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.25);
        }

        .project-card h2 {
            margin-bottom: 10px;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 12px;
        }

        .skill-item {
            background: var(--dark);
            color: #fff;
            padding: 8px 16px;
            border-radius: 22px;
            font-size: 12px;
        }

        .project-link {
            display: inline-block;
            margin-top: 16px;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }

        .project-link:hover {
            text-decoration: underline;
        }

        /* ===== FOOTER ===== */
        footer {
            background: #121212;
            color: #aaa;
            text-align: center;
            padding: 26px 0;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav>
    <div class="nav-inner">

        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-logo">
                Ojan
            </a>

            <div class="nav-links">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('dashboard.projects.index') }}">Kelola proyek</a>
                <a href="{{ route('portfolio') }}">Portfolio</a>
                <a href="{{ route('projects') }}" style="color: var(--accent);">Galeri publik</a>
            </div>
        </div>

        <div class="nav-right">
            <span class="nav-user">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-logout">Logout</button>
            </form>
        </div>

    </div>
</nav>

<!-- ================= CONTENT ================= -->
<div class="container">
    <section>
        <h1>Galeri proyek (publik)</h1>
        <p>Menampilkan <strong>semua proyek</strong> dari seluruh pengguna. Ini <strong>bukan</strong> halaman portfolio pribadi.</p>
        <p style="margin-top: 12px; font-size: 14px; opacity: 0.9;">
            Untuk mengubah proyek Anda (CRUD), gunakan menu <strong>Kelola proyek</strong> di atas atau tab <strong>Projects</strong> di dashboard.
        </p>

        <form method="GET" action="{{ route('projects') }}" style="margin-top: 24px; display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end;">
            <div style="flex: 1; min-width: 200px;">
                <label for="q" style="display: block; font-size: 13px; color: #bbb; margin-bottom: 6px;">Cari proyek</label>
                <input type="search" name="q" id="q" value="{{ $q }}"
                       placeholder="Judul, deskripsi, teknologi…"
                       style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.2); background: rgba(0,0,0,0.25); color: #fff;">
            </div>
            <button type="submit" style="padding: 10px 20px; border-radius: 10px; border: none; background: var(--accent); color: #111; font-weight: 600; cursor: pointer;">
                Cari
            </button>
            @if ($q !== '')
                <a href="{{ route('projects') }}" style="padding: 10px 16px; color: #ccc; font-size: 14px;">Reset</a>
            @endif
        </form>
    </section>
</div>

<div class="white-area">
    <div class="container">

        <section>
            @forelse ($projects as $project)
                <div class="project-card">
                    <h2>{{ $project->title }}</h2>
                    <p>{{ $project->description }}</p>

                    <div class="skills">
                        @foreach ($project->tech as $tech)
                            <div class="skill-item">{{ $tech }}</div>
                        @endforeach
                    </div>

                    @if ($project->link)
                        <a href="{{ $project->link }}" class="project-link">
                            Lihat Proyek →
                        </a>
                    @endif
                </div>
            @empty
                <p>Tidak ada proyek yang cocok{{ $q !== '' ? ' dengan pencarian ini' : '' }}.</p>
            @endforelse
        </section>

        @if ($projects->hasPages())
            <div style="display: flex; justify-content: center; gap: 24px; padding: 24px 0 0; flex-wrap: wrap;">
                @if (!$projects->onFirstPage())
                    <a href="{{ $projects->previousPageUrl() }}" style="color: var(--accent); text-decoration: none; font-weight: 500;">← Sebelumnya</a>
                @endif
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}" style="color: var(--accent); text-decoration: none; font-weight: 500;">Selanjutnya →</a>
                @endif
            </div>
        @endif

    </div>
</div>

<footer>
    <p>&copy; {{ date('Y') }} | Tugas Portfolio • Ojan</p>
</footer>

</body>
</html>
