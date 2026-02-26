<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function publicIndex(): View
    {
        $projects = Project::latest()->get();

        return view('pages.projects', compact('projects'));
    }

    public function index(): View
    {
        $projects = Project::latest()->get();

        return view('dashboard.projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tech' => ['nullable', 'string'],
            'link' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['tech'] = $this->parseTech($validated['tech'] ?? '');

        Project::create($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project): View
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tech' => ['nullable', 'string'],
            'link' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['tech'] = $this->parseTech($validated['tech'] ?? '');

        $project->update($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    private function parseTech(string $tech): array
    {
        $items = array_map('trim', explode(',', $tech));

        return array_values(array_filter($items, fn ($item) => $item !== ''));
    }
}
