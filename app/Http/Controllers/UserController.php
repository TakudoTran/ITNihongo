<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\CheckAuthTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use CheckAuthTraits;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        if (!$this->notLoggedIn()) redirect()->to('home');
        return view('register');
    }

    public function postRegister(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            if (Auth::attempt(['email' => $request->email,
                'password' => $request->password
            ])) {
                return redirect()->to('home');
            }
        } catch (\Exception $exception) {
            return redirect()->to('user/register');
        }
    }

    public function login()
    {
//        dd(bcrypt('123'));
        $previousUrl = session(['link' => url()->previous()]);
        if (!$this->notLoggedIn()) {
            if (str_contains($previousUrl, 'register'))
                return redirect()->to('home');
            else
                return redirect()->to($previousUrl);
        }
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            if (!empty(session('link'))) {
                if (str_contains(session('link'), 'register'))
                    return redirect()->to('home');
                else
                    return redirect(session('link'));
            }
            return redirect()->to('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }

}
