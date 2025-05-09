<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Rules\NotReservedLogin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $login = '';

    public string $phone = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'min:10', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],

            'login' => [
              'required', 
              'string', 
              'lowercase', 
              'min:3', 
              'max:32', 
              'unique:'.User::class,
              'alpha_dash', 
              'not_regex:/^\d+$/', 
              new NotReservedLogin()
            ],

            'phone' => ['required', 'digits:10', 'unique:'.User::class],

            'password' => ['required', 'string', 'min:3', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
