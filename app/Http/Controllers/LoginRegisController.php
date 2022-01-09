<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginRegisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }
    public function register(Request $request){
        $validate = $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:auths'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        DB::table('auths')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => $request->password,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('loginuser.index');
    }
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'exist:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate( [
            'email' => ['required', 'string', 'email', 'max:255','exists:auths,email'],
            'password' => ['required', 'string', 'min:8','exists:auths,password'],
        ]);
        $auth = Auth::all();
        $admin = User::all();

        $email = $request->email;
        $password = $request->password;
        $resulf = Auth::where('email', $email)->where('password', $password)->first();

        if($resulf){
            Session::put('user_name', $resulf->email);
            Session::put('user_id', $resulf->password);
            return redirect()->route('homepage', compact('admin','auth'));
        }else{
            Session::put('message', 'Thông tin đăng nhập không đúng');
            return redirect()->back();
        }


        // $this->validate($request, [
        //     'email'           => 'required|max:255|email',
        //     'password'           => 'required|confirmed',
        // ]);
        // if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //     // Success
        //     return redirect()->route('homepage');
        // } else {
        //     // Go back on error (or do what you want)
        //     return redirect()->back();
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
