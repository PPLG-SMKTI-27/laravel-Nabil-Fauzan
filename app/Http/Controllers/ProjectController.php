<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /* ===== PUBLIC LIST ===== */
    public function publicIndex(): View
    {
        $projects = Project::latest()->get();
        return view('pages.projects', compact('projects'));
    }

    /* ===== DASHBOARD LIST ===== */
    public function index(): View
    {
        if (Auth::user()->role === 'admin') {
            $projects = Project::latest()->get();
        } else {
            $projects = Project::where('user_id', Auth::id())->latest()->get();
        }

        return view('dashboard.projects.index', compact('projects'));
    }

    /* ===== CREATE ===== */
    public function create(): View
    {
        return view('dashboard.projects.create');
    }

    /* ===== STORE ===== */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tech' => ['required', 'string'],
            'link' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['tech'] = $this->parseTech($validated['tech']);
        $validated['user_id'] = Auth::id();

        Project::create($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    /* ===== EDIT ===== */
    public function edit(Project $project): View
    {
        $this->authorizeProject($project);

        return view('dashboard.projects.edit', compact('project'));
    }

    /* ===== UPDATE ===== */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $this->authorizeProject($project);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'tech' => ['required', 'string'],
            'link' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['tech'] = $this->parseTech($validated['tech']);

        $project->update($validated);

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    /* ===== DELETE ===== */
    public function destroy(Project $project): RedirectResponse
    {
        $this->authorizeProject($project);

        $project->delete();

        return redirect()->route('dashboard.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    /* ===== ROLE CHECK ===== */
    private function authorizeProject(Project $project): void
    {
        if (Auth::user()->role !== 'admin' && $project->user_id !== Auth::id()) {
            abort(403);
        }
    }

    /* ===== TECH PARSER ===== */
    private function parseTech(string $tech): array
    {
        $items = array_map('trim', explode(',', $tech));
        return array_values(array_filter($items, fn ($item) => $item !== ''));
    }
}