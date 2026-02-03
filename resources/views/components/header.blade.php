<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? 'Portfolio | Ojan' }}</title>

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

    /* ===== LAYOUT ===== */
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

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .white-area {
      background: #ffffff;
      color: #222;
      border-radius: 22px 22px 0 0;
      box-shadow: 0 -15px 40px rgba(0,0,0,0.15);
    }

    /* ===== FOTO PROFIL ===== */
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

    .profile-text {
      max-width: 600px;
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
      transition: 0.3s;
    }

    .skill-item:hover {
      background: var(--accent);
      color: #000;
      transform: translateY(-5px);
    }

        /* ===== LOGIN ===== */
    .login-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background: rgba(255,255,255,0.05);
      backdrop-filter: blur(10px);
      padding: 40px 36px;
      border-radius: 22px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 25px 50px rgba(0,0,0,0.35);
    }

    .login-card h1 {
      text-align: center;
      margin-bottom: 8px;
    }

    .login-subtitle {
      text-align: center;
      font-size: 14px;
      color: #ccc;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 22px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      margin-bottom: 6px;
      color: #bbb;
    }

    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 14px;
      border: none;
      outline: none;
      background: var(--dark-soft);
      color: #fff;
      font-size: 14px;
      transition: 0.3s;
    }

    .form-group input:focus {
      background: #333;
      box-shadow: 0 0 0 2px rgba(79,195,247,0.4);
    }

    .login-btn {
      width: 100%;
      padding: 13px;
      border-radius: 18px;
      border: none;
      background: linear-gradient(135deg, var(--accent), #1976d2);
      color: #000;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(79,195,247,0.45);
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
  </style>
</head>

<body>
