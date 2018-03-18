<?php

namespace App\Http\Controllers\Auth;

use App\SocialProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }




public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try{
        $userinfo = Socialite::driver($provider)->user();

        }catch (\Exception $exception){
            return redirect('/');
        }

        $socialProvider = SocialProvider::where('provider_id', $userinfo->getId())->first();

        if (!$socialProvider){
            $user = User::firstOrCreate([
            'email' => $userinfo->getEmail(),
            'name' => $userinfo->getName()

            ]);

            $user->socialProviders()->create([
                'user_id' => $user->id,
                'provider_id' => $userinfo->getId(),
                'provider' => $provider
            ]);


            auth()->login($user);
            return redirect('/home');

        }else{
            $userlogin = $socialProvider->user;
            auth()->login($userlogin);
            return redirect('/home');
        }


//        dd($user);



    }







}
