<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login menggunakan username atau email
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Username atau email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $login = $credentials['login'];

        $field = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $authCredentials = [
            $field => $login,
            'password' => $credentials['password'],
        ];

        $remember = $request->boolean('remember');

        if (Auth::attempt($authCredentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('profile')
                ->with('success', 'Login berhasil. Selamat datang di KursusKu!');
        }

        return back()
            ->withErrors([
                'login' => 'Username, email, atau password salah.',
            ])
            ->onlyInput('login');
    }

    // Menampilkan halaman lupa password
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Memeriksa email dan langsung menuju halaman ubah password lokal
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak ditemukan.',
        ]);

        return redirect()->route('password.local.form', [
            'email' => $request->email,
        ]);
    }

    // Menampilkan halaman reset password melalui tautan Laravel
    public function showResetPassword(Request $request, string $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    // Memproses reset password melalui token Laravel
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password,
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')
                ->with('success', 'Password berhasil diubah. Silakan login kembali.');
        }

        return back()->withErrors([
            'email' => __($status),
        ]);
    }

    // Menampilkan halaman ubah password langsung (khusus praktikum lokal)
    public function showLocalPasswordForm(Request $request)
    {
        $email = $request->query('email');

        if (!$email || !User::where('email', $email)->exists()) {
            return redirect()->route('password.request')
                ->withErrors([
                    'email' => 'Email tidak ditemukan.',
                ]);
        }

        return view('auth.change-password', compact('email'));
    }

    // Menyimpan password baru
    public function updateLocalPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $user->password = $request->password;
        $user->save();

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }

    // Menampilkan halaman profil
    public function profile()
    {
        return view('auth.profile');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
