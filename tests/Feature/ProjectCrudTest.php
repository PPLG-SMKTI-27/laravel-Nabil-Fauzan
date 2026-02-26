<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_admin_cannot_access_project_dashboard_crud(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $response = $this->actingAs($user)->get(route('dashboard.projects.index'));

        $response->assertRedirect(route('dashboard'));
    }

    public function test_admin_can_create_update_and_delete_project(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->post(route('dashboard.projects.store'), [
                'title' => 'Project Alpha',
                'description' => 'Deskripsi project alpha',
                'tech' => 'Laravel, Tailwind',
                'link' => 'https://example.com',
            ])
            ->assertRedirect(route('dashboard.projects.index'));

        $project = Project::first();

        $this->assertNotNull($project);
        $this->assertSame(['Laravel', 'Tailwind'], $project->tech);

        $this->actingAs($admin)
            ->put(route('dashboard.projects.update', $project), [
                'title' => 'Project Alpha Updated',
                'description' => 'Deskripsi baru',
                'tech' => 'Laravel, Vue',
                'link' => 'https://example.org',
            ])
            ->assertRedirect(route('dashboard.projects.index'));

        $project->refresh();

        $this->assertSame('Project Alpha Updated', $project->title);
        $this->assertSame(['Laravel', 'Vue'], $project->tech);

        $this->actingAs($admin)
            ->delete(route('dashboard.projects.destroy', $project))
            ->assertRedirect(route('dashboard.projects.index'));

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
