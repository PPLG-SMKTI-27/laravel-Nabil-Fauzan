<nav>
  <div class="nav-container">
    <strong>TUGAS PORTFOLIO</strong>

    <div>
      @if (Request::is('projects'))
        <a href="{{ url('/') }}">← Kembali ke Portfolio</a>
      @else
        <a href="#tentang">Tentang</a>
        <a href="#informasi">Informasi</a>
        <a href="#keahlian">Keahlian</a>
        <a href="{{ url('/projects') }}">Semua Proyek</a>
      @endif
    </div>
  </div>
</nav>

<style>
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
</style>
