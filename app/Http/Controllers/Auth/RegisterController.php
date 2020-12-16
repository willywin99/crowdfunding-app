<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Events\UserRegistered;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|unique:users,email|email',
            'name' => 'required',
        ]);

        $data_request = $request->all();

        $user = User::create($data_request);

        event(new UserRegistered($user, 'register'));

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'user baru berhasil didaftarkan, silahkan cek email untuk melihat kode otp',
            'data' => $data
        ]);
    }
}
