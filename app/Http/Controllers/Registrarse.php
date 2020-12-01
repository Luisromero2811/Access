<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;
class Registrarse extends Controller
{
 public function Registro(Request $request)
 {
    $request->validate([
        'email'=>'required|email',
        'password'=>'required',
    ]);
    $User = new User();
    $User->name=$request->name;
    $User->email=$request->email;
    $User->password=Hash::make($request->password);
    //$Personas->Verificado=false;
    if($User->save())
    {
    Mail::to('luisvazquezromero28@gmail.com')->send(new Registro());
    return response()->json($User,200);    
}
    return abort(422,"Fallo registro");    
}
 }   

