<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginMemberController extends Controller
{
    public function create()
    {
        return view('authMember.login');
    }

    public function store(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('member')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('member.dashboard');
        }
        return redirect()->back()->with('error');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)  {
        Auth::guard('member')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
