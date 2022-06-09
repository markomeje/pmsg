<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Validator;

class LoginController extends Controller
{

    /**
     * Login View
     * 
     * @return void
     */
    public function login()
    {
        return view('frontend.auth.login')->with(['title' => 'Login']);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->invalidate();

        foreach(request()->cookie() as $name => $value) {
            Cookie::queue(Cookie::forget($name));
        }

        $redirect = request()->query('redirect');
        return Route::has($redirect) ? redirect()->route($redirect) : redirect()->route('login');
    }

    /**
     * Api Login
     * 
     */
    public function auth()
    {
        $data = request()->only(['email', 'password']);
        $validator = Validator::make($data, [
            'email' => ['required', 'email'], 
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $user = User::where(['email' => $data['email']])->first();
        if (empty($user)) {
            return response()->json([
                'status' => 0,
                'info' => 'Invalid login details.'
            ]);
        }

        if (auth()->attempt(['email' => $user->email, 'password' => $data['password']])) {
            request()->session()->regenerate();

            return response()->json([
                'status' => 1,
                'info' => 'Operation successful.', 
                'redirect' => route('admin'),
            ]);
        }

        return response()->json([
            'status' => 0,
            'info' => 'Invalid login details'
        ]);
    }

}
