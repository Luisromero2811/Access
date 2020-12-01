<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comentario;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Commentarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;

class Comentarios extends Controller
{
    public function comentar(Request $request){
        //dd($request->user()->id);
        $com=new Comentario();
        $com->Comentarios=$request->Comentario;
        $com->id_producto=$request->id_producto;
        $com->id_persona=$request->id;
        if($com->save()){
            Mail::to('19170166@uttcampus.edu.mx')->send(new Commentarios());
            return response()->json(['Comentario guardado'],200);
        }
    }
}
