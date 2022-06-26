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


        $file = $request->file('img');

        $img = imagecreatefromstring(file_get_contents($file));
        ob_start();
        imagejpeg($img,NULL,100);
        $cont = ob_get_contents();
        ob_end_clean();
        imagedestroy($img);
        $content = imagecreatefromstring($cont);

        $img_name = date('YmdHi');

        $output = 'upload/img/' . $img_name . '.webp';
        imagewebp($content, $output);
        imagedestroy($content);
        echo '<h4>image Save in Webp format</h4>';


        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'img' => $output,
            'created_at' => Carbon::now()
        ]);

    }
}
