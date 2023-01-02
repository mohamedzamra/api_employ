<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use GeneralTrait;
    public function register(Request $request){
        /* $date=User::create([
             'name'=>$request->name,
             'password'=>Hash::make($request->password),
             'email'=>$request->email,
             'api_token'=>Str::random(60),
         ]);
             return $date;*/
        $validatoer=Validator::make($request->all(),[
            'name'=>'required|max:191',
            'email'=>'required|max:191|unique:users',
            'password'=>'required|max:191',
        ],[
            'name.required'=>'الاسم مطلوب',
            'name.max'=>'',
            'email.unique'=>'الابيميل موجود بالفعل الرجاء التغيرى',
        ]);
        if ($validatoer->fails()){
            return $validatoer->errors();
        }else{
            $date=User::create([
                'name'=>$request->name,
                'password'=>Hash::make($request->password),
                'email'=>$request->email,
                'api_token'=>Str::random(60),
            ]);
            return $date;
        }
    }
}
