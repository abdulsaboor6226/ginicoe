<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    protected $maxAttempts = 6; // Default is 5
    protected $decayMinutes = 1; // Default is 1
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {

    
        if ($this->limiter()->attempts($this->throttleKey($request)) == 5) {
            $this->incrementLoginAttempts($request);
            throw ValidationException::withMessages(['lock_account_warning' => __('Your account will be blocked in another wrong attempt')]);
        }
         if ($this->limiter()->attempts($this->throttleKey($request)) == 6) {
             User::where('email',$request->email)->update(['status'=>0]);
            throw ValidationException::withMessages(['lock_account_message' => __('Your account has been blocked. Contact your administrator')]);
        }

        $user = User::where('email',$request->email)->first();

        if ($user->status == 0) {
            
           throw ValidationException::withMessages(['lock_account_message' => __('Your account has been blocked. Contact your administrator')]);
       }
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function credentials(Request $request)
    {
        // clear old sessions
        \Session()->forget('_Loader_WebmasterSettings');
        \Session()->forget('_Loader_Web_Settings');
        \Session()->forget('_Loader_Languages');
        \Session()->forget('_Loader_Events');
        \Session()->forget('_Loader_WebmasterSections');

        return array_merge($request->only($this->username(), 'password'), ['status' => 1]);
    }
}
