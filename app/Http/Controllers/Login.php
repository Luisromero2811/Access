<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Loginn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;

class Login extends Controller
{
    public function Loguear(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $usuario=User::where('email',$request->email)->first();
        //dd($usuario);
        if(!$usuario||!Hash::check($request->password,$usuario->password)){
            throw ValidationException::withMessages([
                'correo|password'=>['Datos incorrectos']
            ]);
        }
        else{
            $token=$usuario->createToken($request->email,['user'])->plainTextToken;
            Mail::to('luisvazquezromero28@gmail.com')->send(new Loginn());
            return response()->json(['token: '=>$token],200);
        }
        return response()->json(['Error al realizar el Token'],400);
    }
    /*public function Loguear(Request $request)
    {
        $request->validate([
            'email'=>'required', 'password'=>'required',
        ]);
        //Va guardar en la variable lo que encuentre
        $User=User::where('email',$request->email)->first();
        if(!$User|| !Hash::check($request->password,$User->password))
        {
        throw ValidationException::withMessages([
            'email|password'=>["Datos erroneos"],
        ]);
        }           
      }*/ 
    }

    //Mail::to('luisvazquezromero28@gmail.com')->send(new Registro());