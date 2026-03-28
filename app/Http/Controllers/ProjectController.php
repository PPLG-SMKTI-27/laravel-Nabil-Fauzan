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
    public function publicIndex(Request $request): View
    {
        $q = trim((string) $request->input('q', ''));

        $projects = Project::query()
            ->search($q)
            ->latest()
            ->simplePaginate(12)
            ->withQueryString();

        return view('pages.projects', [
            'projects' => $projects,
            'q' => $q,
        ]);
    }

    /* ===== DASHBOARD LIST ===== */
    public function index(Request $request): View
    {
        $q = trim((string) $request->input('q', ''));

        $base = Project::query()->search($q);

        if (Auth::user()->role !== 'admin') {
            $base->where('user_id', Auth::id());
        }

        $projects = $base->latest()->paginate(15)->withQueryString();

        return view('dashboard.projects.index', [
            'projects' => $projects,
            'q' => $q,
        ]);
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