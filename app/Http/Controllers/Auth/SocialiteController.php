<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Socialite as ModelsSocialite;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
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
        //->where('provider_token', $socialUser->getToken())

        if (!$socialAccount) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::updateOrCreate([
                    'name' => $socialUser->getName() ? $socialUser->getName() : $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    'profile_picture' => $socialUser->getAvatar(),
                ]);
            }

            $user->socialite()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
                // 'profile_picture' => $socialUser->getAvatar(),
                // 'email_verified_at' => now(),
            ]);
            return $user;
        }
        return $socialAccount->user;
    }
}
