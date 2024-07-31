<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Socialite as ModelsSocialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $authuser = $this->store($socialUser, $provider);

        Auth::login($authuser);

        return redirect('/dashboard');
    }
    public function store($socialUser, $provider)
    {
        $socialAccount = ModelsSocialite::where('provider_id', $socialUser->getId())->where('provider_name', $provider)->first();

        if ($socialAccount) {
            $user = User::updateOrCreate(
                [
                    'name' => $socialUser->getName() ? $socialUser->getName() : $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                ]
            );

            $user->socialite()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
                // 'avatar' => $socialUser->getAvatar(),
                // 'email_verified_at' => now(),
            ]);
            return $user;
        }

        // If $socialAccount is null, handle the case here
        // For example, create a new user and social account
        $user = User::create([
            'name' => $socialUser->getName() ? $socialUser->getName() : $socialUser->getNickname(),
            'email' => $socialUser->getEmail(),
        ]);

        $user->socialite()->create([
            'provider_id' => $socialUser->getId(),
            'provider_name' => $provider,
            'provider_token' => $socialUser->token,
            'provider_refresh_token' => $socialUser->refreshToken,
            // 'avatar' => $socialUser->getAvatar(),
            // 'email_verified_at' => now(),
        ]);

        return $user;
    }
}
