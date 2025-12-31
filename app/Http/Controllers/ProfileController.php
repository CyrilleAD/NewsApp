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
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Remplit les données validées (nom, email, etc.)
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('image')) {
            // 1. Supprimer l'ancienne image si elle existe
            if (!empty($user->image)) {
                $oldImagePath = public_path('back_auth/assets/profile/' . $user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // 2. Préparer et déplacer le nouveau fichier
            $file = $request->file('image');
            // On utilise time() pour être sûr d'avoir un nom unique
            $file_name = time() . '.' . $file->extension();
            $file->move(public_path('back_auth/assets/profile'), $file_name);

            // 3. Enregistrer le nom en base de données
            $user->image = $file_name;
        }

        // Pas besoin de refaire $user->name = $request->name; 
        // car le ->fill($request->validated()) au début s'en occupe déjà !

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profil modifié avec succès');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
