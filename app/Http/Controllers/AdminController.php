<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }


    public function AdminLogin(){
        return view('admin.admin_login');
    }



//     public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         // Authentication passed
//         return redirect()->route('admin.dashboard');
//     } else {
//         // Authentication failed
//         return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
//     }
// }

}
