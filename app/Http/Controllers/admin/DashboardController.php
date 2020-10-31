<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ]);
if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
$input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Admin::create($input);
        
return view('admin.login');
    }

    public function login(Request $request)
    {

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            return view('admin.dashboard');
        } else {
            return redirect('admin.login');
        }

        return view('admin.register');

        


    }

    public function dashboard(Request $request)
    {
$user = $request->user();
        // the full object of the customer as containted in the able would
        // be available now

        return view('admin.dashboard', compact($user));
    }
}
