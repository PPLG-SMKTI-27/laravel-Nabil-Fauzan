@include('components.header', ['title' => 'Daftar Proyek | Ojan'])
@include('components.navbar')

<div class="container">
  <section>
    <h1>Proyek Saya</h1>
    <p>Berikut beberapa proyek yang pernah saya kerjakan.</p>
  </section>

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
      <p>Belum ada proyek yang ditambahkan.</p>
    @endforelse
  </section>
</div>

@include('components.footer')
