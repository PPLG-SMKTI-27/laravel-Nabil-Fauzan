<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * =========================
     * PROFILE (BREEZE DEFAULT)
     * =========================
     */

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (array_key_exists('skills', $data)) {
            $raw = $data['skills'] ?? '';
            $data['skills'] = $raw === ''
                ? null
                : array_values(array_filter(
                    array_map('trim', explode(',', $raw)),
                    fn (string $s): bool => $s !== ''
                ));
        }

        if (array_key_exists('bio', $data) && ($data['bio'] ?? '') === '') {
            $data['bio'] = null;
        }

        $request->user()->fill($data);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function portfolio(Request $request): View
    {
        $user = $request->user();
        $user->load(['projects' => fn ($q) => $q->latest()]);

        return view('pages.portfolio', [
            'user' => $user,
            'portfolioProjects' => $user->projects,
        ]);
    }
}
