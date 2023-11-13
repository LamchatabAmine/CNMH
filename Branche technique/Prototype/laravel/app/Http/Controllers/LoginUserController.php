<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginUserController extends Controller
{

    public function create(): View
    {
        return view('welcome');
    }

    public function store(Request $request)
    {

        // Validate the login request
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($validatedData)) {
            // Authentication successful
            if (Auth::user()->role == 'leader') {
                return redirect()->route('project.index');
            } elseif (Auth::user()->role == 'member') {
                return redirect()->route('member.waiting');
            }
            // return redirect()->route('project.index');
        }

        // Authentication failed
        return back()->withErrors(['email' => "les informations d'identification invalides"])->withInput($request->except('password'));
    }

    public function destroy(Request $request)
    {
        // dd($request);
        Auth::logout(); // Logout the user

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
