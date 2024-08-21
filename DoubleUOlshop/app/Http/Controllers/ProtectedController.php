<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;


class ProtectedController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        try {
            $auth = app('firebase.auth');
            $signInResult = $auth->signInWithEmailAndPassword($credentials['email'], $credentials['password']);
            $firebaseUser = $signInResult->data();

            // Simpan informasi pengguna ke session
            $request->session()->put('firebase_user', $firebaseUser);

            // Redirect ke halaman yang dilindungi
            return redirect()->route('produk.index');
        } catch (\Exception $e) {
            // Tangani error jika login gagal
            return redirect()->route('loginView')->withErrors(['email' => 'Login failed, please try again.']);
        }
    }

    public function logout(Request $request)
    {
        // Hapus semua data pengguna dari session
        $request->session()->forget('firebase_user');
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect()->route('loginView');
    }
}
