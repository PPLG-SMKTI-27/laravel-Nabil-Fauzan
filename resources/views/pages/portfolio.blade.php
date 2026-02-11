<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Ojan</title>

    {{-- Alpine (opsional, aman walau tidak dipakai) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

        html { scroll-behavior: smooth; }

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
            padding: 140px 0 80px; /* offset navbar */
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

        /* ===== TENTANG ===== */
        .tentang-wrapper {
            display: flex;
            align-items: center;
            gap: 35px;
            flex-wrap: wrap;
        }

        .profile-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), #1976d2);
            padding: 4px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.45);
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        /* ===== SKILLS ===== */
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
                TUGAS PORTFOLIO
            </a>

            <div class="nav-links">
                <a href="#tentang">Tentang</a>
                <a href="#informasi">Informasi</a>
                <a href="#keahlian">Keahlian</a>
                <a href="{{ url('/projects') }}">Projects</a>
            </div>
        </div>

        <div class="nav-right">
            <span class="nav-user">
                {{ Auth::user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-logout">
                    Logout
                </button>
            </form>
        </div>

    </div>
</nav>

<!-- ================= CONTENT ================= -->
<div class="container">
    <section id="tentang">
        <div class="tentang-wrapper">
            <div class="profile-photo">
                <img src="{{ asset('images/profile.png') }}" alt="Profile">
            </div>
            <div>
                <h1>Informasi Singkat</h1>
                <p>
                    Saya adalah siswa PPLG yang berfokus pada pengembangan web modern,
                    rapi, dan efisien. Tertarik pada frontend serta backend development
                    dan pembuatan sistem berbasis web.
                </p>
            </div>
        </div>
    </section>
</div>

<div class="white-area">
    <div class="container">

        <section id="informasi">
            <h2>Informasi</h2>
            <p>
                Saya merupakan siswa Program Pengembangan Perangkat Lunak dan Gim (PPLG)
                yang memiliki ketertarikan dalam pengembangan aplikasi berbasis web.
            </p>
        </section>

        <section id="keahlian">
            <h2>Keahlian</h2>
            <div class="skills">
                <div class="skill-item">HTML</div>
                <div class="skill-item">CSS</div>
                <div class="skill-item">JavaScript</div>
                <div class="skill-item">PHP</div>
                <div class="skill-item">MySQL</div>
                <div class="skill-item">MVC</div>
            </div>
        </section>

    </div>
</div>

<footer>
    <p>&copy; {{ date('Y') }} | Tugas Portfolio • Ojan</p>
</footer>

</body>
</html>
