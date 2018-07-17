<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Notifications\User\sendUserActivation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/portal';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function register(Request $request)
    {
        /** @var User $user */
        $validatedData = $request->validate([
            'firstname'     => 'required|string|max:255',
            'lastname'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $validatedData['password']        =Hash::make(array_get($validatedData, 'password'));
            $validatedData['activation_code'] = str_random(30).time();
            $validatedData['gender'] = $request->gender;
            $user  = app(User::class)->create($validatedData);

        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->with('error', 'Unable to create new user.');
        }
       $user->notify(new sendUserActivation($user));
        return redirect()->route('user.dashboard')->with('success', 'Successfully created a new account. Please check your email and activate your account.');
    }

    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user || $user->status == 1) {
                return redirect()->back()->with('error', 'The code does not exist for any user in our system.');
            }
            $user->status = 1;
            $user->activation_code = null;
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.";
        }
        return redirect()->route('user.dashboard');
    }
}
