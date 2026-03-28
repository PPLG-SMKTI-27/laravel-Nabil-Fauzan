<?php

use App\Models\User;

test('admin can view user management', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.users.index'))
        ->assertOk();
});

test('non admin is redirected from user management', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->actingAs($user)
        ->get(route('admin.users.index'))
        ->assertRedirect(route('dashboard'))
        ->assertSessionHas('error');
});

test('admin can update another users role', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $target = User::factory()->create(['role' => 'user']);

    $this->actingAs($admin)
        ->patch(route('admin.users.update', $target), ['role' => 'admin'])
        ->assertRedirect();

    expect($target->fresh()->role)->toBe('admin');
});
