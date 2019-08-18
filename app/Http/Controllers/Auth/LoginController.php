<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/home';
    }

    public function redirectToAdmin()
    {
        return app()->getLocale() . '/admin';
    }

    protected function authenticated(Request $request, $user) {
        if($request->ajax()){
            // return response()->json(['status'=>'Ajax request']);
            $role_name = $user->role()->first()->role_name;
            if($role_name ==='admin') {
                return response()->json([
                    'auth' => auth()->check(),
                    'user' => $user,
                    'intended' => $this->redirectToAdmin()
                ]);
            }else{
                return response()->json([
                    'auth' => auth()->check(),
                    'user' => $user,
                    'intended' => $this->redirectPath()
                ]);
            }
        }
        // you will see "else" by login from traditional HTTP
        // return response()->json(['status'=>'Http request']);    
    }

    public function showLoginForm()
    {
        return redirect()->route('index', app()->getLocale());
    }
}
