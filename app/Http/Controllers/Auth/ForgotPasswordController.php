<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Hash;
use Illuminate\Support\Str;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;



    public function index()
    {
        return view('security.forgot_password');
    }


    public function sendEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email|bail|exists:users'
        ]);

        $token = Str::random(64);


        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgot', ['token' => $token], function ($message) use ($request) {
            $message->sender($request->email);
            $message->subject('Recuperar clave');
        });


        return redirect()->back()
            ->with(['message' => 'Enviamos un correo a '
                . $request->email . '. Ingresa y sigue las instrucciones para continuar con la recuperación de la contraseña']);
    }
}