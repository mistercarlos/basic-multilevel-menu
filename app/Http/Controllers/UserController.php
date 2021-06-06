<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            $data = [];
                                            
            $message = [
                'required' => 'All fields must be filled',
            ];

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ],$message);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $data['email'] = htmlspecialchars(trim(stripslashes($request->email)));
            $data['password'] = htmlspecialchars(trim($request->password));
            $user = User::where('email', $data['email'])->first();

            if(!$user){
                return redirect()->route('signin')->with(['status' => false, 'message' => "email or password is incorrect !!!"]);
            }
            if(!Hash::check($data['password'], $user->password)){
                return redirect()->route('signin')->with(['status' => false, 'message' => "email or password is incorrect !!!"]);
            }

            $profile = Profile::where('user_id', $user->id)->first();
            $profile = json_decode(json_encode($profile), true);
            $profile['email'] = $user->email;
            $profile['isadmin'] = $user->admin;

            Session::flush();
            Session::put('connected', true);
            Session::put('user', $profile);
            Session::save();
            
            return redirect()->route('signin')->with(['status' => true, 'message' => "Logged successfully"]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->route('signin')->with(['status' => false, 'message' => "Issue. Please, contact administrator !!!"]);
        }
    }

    public function register(Request $request)
    {
        try{
            $data = [];
                                        
            $message = [
                'required' => 'All fields must be filled',
                'min' => "Value lenght of firstname or lastname is low than the min authorize",
                'max' => "Value lenght of firstname or lastname is up than the max authorize",
            ];

            $validator = Validator::make($request->all(), [
                'firstname' => 'required|min:5|max:250|string',
                'lastname' => 'required|min:5|max:250|string',
                'email' => 'required|email',
                'password' => 'required',
                'cpassword' => 'required|same:password'
            ],$message);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $data['user'] = [];
            $data['profile'] = [];
            $data['profile']['firstname'] = htmlspecialchars(trim(stripslashes($request->firstname)));
            $data['profile']['lastname'] = htmlspecialchars(trim(stripslashes($request->lastname)));
            $data['user']['email'] = htmlspecialchars(trim(stripslashes($request->email)));
            $data['user']['password'] = bcrypt(htmlspecialchars(trim($request->password)));
            $user = User::create($data['user']);
            $data['profile']['user_id'] = $user->id;
            $profile = Profile::create($data['profile']);

            return redirect()->route('signup')->with(['status' => true, 'message' => "Register successfully"]);
        } catch (Exception $e) {
            // dd($e);
            return redirect()->route('signup')->with(['status' => false, 'message' => "Issue. Please, contact administrator !!!"]);
        }
    }

    public function logout(Request $request)
    {
        try {
            Session::flush();
            return redirect(route('signin'));
        } catch (Exception $e) {
            dd($e);
        }
    }

}
