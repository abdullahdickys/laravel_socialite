<?php

namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function handleProviderCallback($driver)
	{
    try {
        $user = Socialite::driver($driver)->user();

        $create = User::firstOrCreate([
            'email' => $user->getEmail()
        ], [
            'socialite_name' => $driver,
            'socialite_id' => $user->getId(),
            'name' => $user->getName(),
            'photo' => $user->getAvatar(),
            'email_verified_at' => now()
        ]);

        auth()->login($create, true);
        return redirect($this->redirectPath());
    } catch (\Exception $e) {
        return redirect()->route('login');
    	}
	}
}
