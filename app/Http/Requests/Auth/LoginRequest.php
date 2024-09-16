<?php

// app/Http/Requests/Auth/LoginRequest.php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username_or_email' => 'required',
            'password' => 'required',
        ];
    }

    public function authenticate()
    {
        $credentials = $this->only('username_or_email', 'password');
        
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
            $this->session()->regenerate();
            return true;
        }

        throw new ValidationException(__('auth.failed'));
    }
}
