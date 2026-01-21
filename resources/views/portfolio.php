<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Dark Modern PPLG</title>

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
      background: rgba(20,20,20,0.85);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.06);
      z-index: 1000;
    }

    .nav-container {
      max-width: 1100px;
      width: 90%;
      margin: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
    }

    .nav-container strong {
      letter-spacing: 1px;
    }

    nav a {
      color: #eaeaea;
      text-decoration: none;
      margin-left: 22px;
      font-size: 14px;
      position: relative;
      transition: 0.3s;
    }

    nav a::after {
      content: "";
      position: absolute;
      bottom: -6px;
      left: 0;
      width: 0;
      height: 2px;
      background: var(--accent);
      transition: 0.3s;
    }

    nav a:hover {
      color: var(--accent);
    }

    nav a:hover::after {
      width: 100%;
    }

    /* ===== GENERAL LAYOUT ===== */
    .container {
      max-width: 1000px;
      width: 90%;
      margin: auto;
      padding: 120px 0 80px;
    }

    section {
      margin-bottom: 70px;
      animation: fadeUp 0.9s ease forwards;
    }

    h1, h2 {
      margin-bottom: 18px;
      color: inherit;
    }

    h1 { font-size: 32px; }
    h2 { font-size: 26px; }

    p {
      line-height: 1.9;
      max-width: 720px;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to { opacity: 1; transform: translateY(0); }
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
      transition: 0.4s ease;
    }

    .profile-photo:hover {
      box-shadow:
        0 0 0 5px rgba(79,195,247,0.25),
        0 0 30px rgba(79,195,247,0.7);
      transform: scale(1.05);
    }

    .profile-photo img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    /* ===== WHITE AREA ===== */
    .white-area {
      background: #ffffff;
      color: #222;
      border-radius: 22px 22px 0 0;
      box-shadow: 0 -15px 40px rgba(0,0,0,0.15);
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
      letter-spacing: 0.5px;
      transition: 0.3s;
      cursor: default;
    }

    .skill-item:hover {
      background: var(--accent);
      color: #000;
      transform: translateY(-5px);
    }

    /* ===== FOOTER ===== */
    footer {
      background: #121212;
      color: #aaa;
      text-align: center;
      padding: 26px 0;
      font-size: 13px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav>
  <div class="nav-container">
    <strong>TUGAS PORTFOLIO</strong>
    <div>
      <a href="#tentang">Tentang</a>
      <a href="#informasi">Informasi</a>
      <a href="#keahlian">Keahlian</a>
      <a href="/projects">Semua Proyek</a>
    </div>
  </div>
</nav>

<!-- DARK AREA -->
<div class="container">
  <section id="tentang">
    <div class="tentang-wrapper">
      <div class="profile-photo">
        <img src="/Koenig.png" alt="Foto Profil">
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

<!-- WHITE AREA -->
<div class="white-area">
  <div class="container">

    <section id="informasi">
      <h2>Informasi</h2>
      <p>
        Saya merupakan siswa Program Pengembangan Perangkat Lunak dan Gim (PPLG)
        yang memiliki ketertarikan dalam pengembangan aplikasi berbasis web.
        Terbiasa menggunakan teknologi frontend dan backend untuk membangun
        website yang terstruktur, responsif, dan mudah dikembangkan.
      </p>
    </section>

    <section id="keahlian">
      <h2>Keahlian</h2>
      <div class="skills">
        <div class="skill-item">HTML</div>
        <div class="skill-item">CSS</div>
        <div class="skill-item">JavaScript</div>
        <div class="skill-item">PHP</div>
        <div class="skill-item">MVC</div>
        <div class="skill-item">MySQL</div>
      </div>
    </section>

  </div>
</div>

<!-- FOOTER -->
<footer>
  <p>&copy; 2026 • Tugas Portfolio — Ojan</p>
</footer>

</body>
</html>
