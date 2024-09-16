<?php

// app/Http/Controllers/Auth/AuthenticatedSessionController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('username_or_email', 'password');
        
        // Cek apakah input adalah email
        if (filter_var($credentials['username_or_email'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $credentials['username_or_email'];
            unset($credentials['username_or_email']);
        } else {
            // Jika bukan email, anggap itu adalah username
            $credentials['username'] = $credentials['username_or_email'];
            unset($credentials['username_or_email']);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home', absolute: false));
        }

        throw ValidationException::withMessages([
            'username_or_email' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
