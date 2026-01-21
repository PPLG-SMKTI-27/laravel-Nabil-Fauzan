<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semua Proyek | Portfolio PPLG</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    html { scroll-behavior: smooth; }

    body {
      background: linear-gradient(135deg, #121212, #1e1e1e);
      color: #eaeaea;
      min-height: 100vh;
    }

    /* ===== NAVBAR (SAMA DENGAN INDEX) ===== */
    nav {
      position: fixed;
      width: 100%;
      top: 0;
      background: rgba(20,20,20,0.85);
      backdrop-filter: blur(8px);
      z-index: 1000;
      border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .nav-container {
      width: 90%;
      max-width: 1100px;
      margin: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
    }

    nav a {
      color: #eaeaea;
      text-decoration: none;
      margin-left: 22px;
      font-size: 14px;
      transition: 0.3s;
    }

    nav a:hover { color: #4fc3f7; }

    /* ===== LAYOUT ===== */
    .container {
      width: 90%;
      max-width: 1100px;
      margin: auto;
      padding: 120px 0 70px;
    }

    h1 {
      margin-bottom: 40px;
      animation: fadeUp 0.8s ease forwards;
    }

    /* ===== PROJECT GRID ===== */
    .projects {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
    }

    .card {
      background: #1f1f1f;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 15px 40px rgba(0,0,0,0.4);
      transition: 0.4s;
      animation: fadeUp 0.8s ease forwards;
    }

    .card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 50px rgba(79,195,247,0.35);
    }

    .card-header {
      height: 160px;
      background: linear-gradient(135deg, #4fc3f7, #1976d2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .card-body {
      padding: 20px;
    }

    .card-body h3 { margin-bottom: 10px; }

    .card-body p {
      font-size: 14px;
      line-height: 1.7;
      color: #cfcfcf;
    }

    .tech {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 15px;
    }

    .tech span {
      font-size: 12px;
      background: #2a2a2a;
      padding: 6px 12px;
      border-radius: 12px;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ===== FOOTER ===== */
    footer {
      background: #121212;
      color: #aaaaaa;
      text-align: center;
      padding: 24px 0;
      font-size: 13px;
      margin-top: 80px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav>
  <div class="nav-container">
    <strong>Tugas Portfolio</strong>
    <div>
      <a href="portfolio">Tentang</a>
      <a href="portfolio#informasi">Informasi</a>
      <a href="portfolio#keahlian">Keahlian</a>
      <a href="projects.php">Semua Proyek</a>
    </div>
  </div>
</nav>

<!-- CONTENT -->
<div class="container">
  <h1>Project Showcase</h1>

  <div class="projects">
    <div class="card">
      <div class="card-header">TOKO KUE</div>
      <div class="card-body">
        <h3>Proyek Toko Kue</h3>
        <p>
          Website toko kue berbasis web yang menampilkan katalog produk,
          pengelolaan data, serta tampilan modern dan responsif.
        </p>
        <div class="tech">
          <span>HTML</span>
          <span>CSS</span>
          <span>JavaScript</span>
          <span>PHP</span>
          <span>MySQL</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer>
  <p>&copy; 2026 | Tugas Portfolio • Ojan</p>
</footer>

</body>
</html>
