<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class UserController extends Controller
{
    public function view(){

    }


    public function update(Request $request){

        $img = $request->file('img');
        $img_file = date('YmdHi').$img->getClientOriginalName();
        $save_path = 'upload/img/'.$img_file;
        $intervention = Image::make($img)->encode('png', 90);
        $intervention->save(public_path('upload/img/'.$img_file));

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'img' => $save_path,
            'created_at' => Carbon::now()
        ]);
    }
}
