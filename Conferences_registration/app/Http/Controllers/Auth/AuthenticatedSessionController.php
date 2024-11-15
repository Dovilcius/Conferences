<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Autentifikuojame vartotoją
        $request->authenticate();

        // Atsinaujiname sesiją
        $request->session()->regenerate();

        // Grąžiname vartotoją į atitinkamą puslapį pagal jo rolę
        return $this->redirectBasedOnRole(Auth::user());
    }

    /**
     * Redirect the user based on their role.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBasedOnRole($user)
    {
        switch ($user->role) {
            case 'client':
                return redirect()->route('dashboard'); // Nukreipiame į 'dashboard' puslapį
            case 'worker':
                return redirect()->route('dashboard2'); // Nukreipiame į 'dashboard2' puslapį
            case 'admin':
                return redirect()->route('dashboard3'); // Nukreipiame į 'dashboard3' puslapį
            default:
                return redirect('/'); // Jei rolė neegzistuoja, nukreipiame į pagrindinį puslapį
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Atsijungiame vartotoją
        Auth::guard('web')->logout();

        // Ištriname sesiją
        $request->session()->invalidate();

        // Regeneruojame sesijos slaptažodį
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
