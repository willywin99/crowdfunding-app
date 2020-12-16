<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;

class RegenerateOtpCodeController extends Controller
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
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->generate_otp_code();

        event(new UserRegistered($user, 'regenerate'));

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'otp berhasil digenerate, silahkan cek email untuk melihat kode otp',
            'data' => $data
        ]);
    }
}
