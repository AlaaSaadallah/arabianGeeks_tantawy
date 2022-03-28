<?php

namespace Modules\CustomerModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\CustomerModule\Entities\Customer;
use Modules\CustomerModule\Services\CustomerService;

class CustomerModuleController extends Controller
{
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    public function login(Request $request)
    {
// dd(Auth::guard('customer')->attempt(
//     [
//                 'email' => $request->email,
//                 'password' => $request->password
//             ],            ));
        // if (Auth::guard('customer')->attempt(
        //     [
        //                 'email' => $request->email,
        //                 'password' => $request->password
        //             ],            )) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('dashboard');
        // }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        // dd(Auth::guard('customer')->attempt($request->only('email', 'password')));
        // dd(Auth::guard('customer')->attempt(
        //     [
        //         'email' => "'".$request->email."'",
        //         // 'em ail' => $request->email,
        //         'phone' => "'".$request->password."'"
        //     ],

        // ));
        
        if (auth()->guard('customer')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],

        )) {

            return redirect()->intended('customer');
        }else{
        return redirect('/');
        // ->view('customermodule::user.login');
    }
}





    public function index()
    {
        if (Auth::guard('customer')->check()) {
         return   redirect()->route('customer.home');
        } else {
            return view('customermodule::user.login');
        }
    }

    public function home()
    {
        return view('customermodule::user.index');
    }

    function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->to('/');
    }
}
