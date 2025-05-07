<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'reference_id' => ['required', 'exists:users,reference_id'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $referrer = User::where('reference_id', $request->reference_id)->first();

//        if (!$referrer) {
//            return back()->withErrors(['ref_code' => 'Invalid referral code.']);
//        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'reference_id' => null,
            'referred_by' => $referrer->id,
            'password' => Hash::make($request->password),
        ]);
//        dd($user, $referrer);

        $user->assignRole('Client');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

}
