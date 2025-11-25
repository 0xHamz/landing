<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // ← ini yang kamu butuhkan

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Simpan data user ke session
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_role' => $user->role ?? 'penumpang', // opsional
            ]);

            return redirect()->route('penumpang.jadwal');
        }

        return back()->with('error', 'Email atau password salah.');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'penumpang',
        ]);

        // Set session
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_email' => $user->email,
        ]);

        return redirect()->route('penumpang.index')->with('success', 'Registrasi berhasil!');
    }
}
