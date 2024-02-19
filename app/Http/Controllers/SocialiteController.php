<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(Request $request)
    {
        try {
            $validator = Validator::make($request->only('provider', 'access_provider_token'), [
                'provider' => ['required', 'string'],
                'access_provider_token' => ['required', 'string']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $provider = $request->provider;
            $validated = $this->validateProvider($provider);
            if (!is_null($validated)) {
                return $validated;
            }

            $providerUser = Socialite::driver($provider)->userFromToken($request->access_provider_token);
            $user = User::firstOrCreate(
                [
                    'email' => $providerUser->getEmail()
                ],
                [
                    'name' => $providerUser->getName(),
                    'password' => Hash::make(Str::random(12)) // Auto-generate a random password
                ]
            );

            $data =  [
                'access_token' => $user->createToken('Sanctom+Socialite')->plainTextToken,
                'user' => $user,
                'providerUser' => $providerUser
            ];

            return response()->json($data, 200);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    protected function validateProvider($provider)
    {
        if (!in_array($provider, ['google'])) {
            return response()->json(["message" => 'You can only login via google account'], 400);
        }
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make(Str::random(12)) // Auto-generate a random password
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
