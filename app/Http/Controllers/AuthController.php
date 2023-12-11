<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function cashierLoginView() {
        return view('cashier.login');
    }

    public function adminDashboard(Request $request){
        // Retrieve the user data from the query parameters
        $userData = $request->query('userData',[]);

        // Use $userData in your view or controller logic
        return view('admin.dashboard', ['userData' => $userData]);
    }


    public function adminLogin(Request $request)
    {
        $response = Http::post('http://127.0.0.1:9000/api/admin/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // dd($response);

        // Check if the login was successful
        if ($response->successful()) {
            
            $userData = $response->json();
            // If successful, redirect to the welcome page
            return redirect()->route('adminDashboard', ['userData' => $userData]);
        } else {
            // If login fails, stay on the login page with an error message
            return view('login')->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function cashierDashboard(Request $request){
        // Retrieve the user data from the query parameters
        $userData = $request->query('userData',[]);

        // Use $userData in your view or controller logic
        return view('cashier.dashboard', ['userData' => $userData]);
    }

    public function cashierLogin(Request $request)
    {
        $response = Http::post('http://127.0.0.1:9000/api/cashier/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // dd($response);

        // Check if the login was successful
        if ($response->successful()) {
            
            $userData = $response->json();
            // If successful, redirect to the welcome page
            return redirect()->route('cashierDashboard', ['userData' => $userData]);
        } else {
            // If login fails, stay on the login page with an error message
            return view('cashier.login')->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
