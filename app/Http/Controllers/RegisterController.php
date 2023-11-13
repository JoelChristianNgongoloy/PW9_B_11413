<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionRegister(Request $request)
    {

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {

            Session::flash('error', 'Email sudah terdaftar, mohon memakai email yang belum terdaftar !');
            return redirect('register');
        }
        
        $str = Str::random(100);
        $user = User::create(
            [
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'verify_key' => $str,
            ]
        );

        $details = [
            'username' => $request->username,
            'website' => 'Atma Library',
            'datetime' => date('y-m-d H:i:s'),
            'url' => request()->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikirim ke email anda. Silahkan cek email anda untuk mengaktifkan akun.');
        return redirect('register');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')->where('verify_key', $verify_key)->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
                ->update([
                    'active' => 1,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
            return "verifikasi berhasil. Akun anda sudah aktif.";
        } else {
            return "Keys tidak valid";
        }
    }
}
