@include('components.header', ['title' => 'Portfolio | Ojan'])
@include('components.navbar')

<div class="container">
  <section id="tentang">
    <x-profile-photo 
      image="{{ asset('images/profile.png') }}"
      title="Informasi Singkat"
    >
      Saya adalah siswa PPLG yang berfokus pada pengembangan web modern, rapi,
      dan efisien. Tertarik pada frontend serta backend development dan
      pembuatan sistem berbasis web.
    </x-profile-photo>
  </section>
</div>

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

@include('components.footer')
