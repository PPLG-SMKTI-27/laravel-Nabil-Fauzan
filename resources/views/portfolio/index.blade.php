@extends('layouts.main')

@section('title', 'Portofolio Saya')

@section('content')
    <div class="header">
        <h1>Halo, saya {{ $nama }}</h1>
        <p class="profesi">{{ $profesi }}</p>
        <p class="tentang">{{ $tentang }}</p>
    </div>

    <h2 class="section-title">Proyek Saya</h2>

    <div class="projects-list">
        @foreach($projects as $project)
            <div class="project-card">
                <h3 class="project-title">{{ $project['title'] }}</h3>
                <p class="project-description">{{ $project['description'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="contact-section">
        <h2 class="section-title">Kontak Saya</h2>
        <a href="mailto:{{ $email }}" class="contact-email">
            {{ $email }}
        </a>
    </div>
@endsection