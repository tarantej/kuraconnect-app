<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PassportAuthController extends Controller
{
    public function index()
    {
        return view('api.user.login');
    }

    public $successStatus = 200;
    /**
     * Registration Req
     */
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
        $user = User::create($input);
        $success['token'] =  $user->createToken('')-> accessToken;
        $success['name'] =  $user->name;
<<<<<<< HEAD

        return view('api.user.dashboard', compact($user));
//return response()->json(['success'=>$success], $this-> successStatus);
=======
return response()->json(['success'=>$success], $this-> successStatus);
>>>>>>> efe2850f272e71493a5df0734a461bc5437977e3
    }

    /**
     * Login Req
     */
    public function login(Request $request)
    {

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('')->accessToken;
            // return response()->json(['token' => $token], 200);
            //return response()->json(['message' => 'Welcome to Dashboard'], 200);
            return view('api.user.dashboard');
        } else {
            return response()->json(['error' => 'Not Allowed'], 401);
        }

        //return response()->json($data);

<<<<<<< HEAD

=======

>>>>>>> efe2850f272e71493a5df0734a461bc5437977e3


    }

    public function userInfo()
    {

     $user = auth()->user();

<<<<<<< HEAD
     return view('api.user.dashboard', compact($user));
=======
     return response()->json(['user' => $user], 200);
>>>>>>> efe2850f272e71493a5df0734a461bc5437977e3

    }

    public function dashboard(Request $request)
    {
$user = $request->user();
        // the full object of the customer as containted in the able would
        // be available now

        return view('api.user.dashboard', compact($user));
    }
}
