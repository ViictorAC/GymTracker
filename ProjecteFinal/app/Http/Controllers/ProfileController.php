<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $request->user()->update($request->only('name', 'email'));

        return redirect()->route('profile.edit')->with('success', 'Perfil actualitzat.');
    }

    public function destroy(Request $request)
    {
        $request->validate(['password' => 'required|current_password']);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        return redirect('/');
    }
}