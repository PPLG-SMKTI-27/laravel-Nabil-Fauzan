@include('components.header', ['title' => 'Login | Ojan'])
@include('components.navbar')

<div class="container">
  <section class="login-wrapper">
    <div class="login-card">
      <h1>Login</h1>
      <p class="login-subtitle">Silakan masuk ke akun Anda</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            autofocus
          >
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
          >
        </div>

        <button type="submit" class="login-btn">
          Masuk
        </button>
      </form>
    </div>
  </section>
</div>

@include('components.footer')