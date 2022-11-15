<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Thumbnails extends BaseController
{

    function __construct(){
        $path= 'storage/videos/shows/';
        $files = Storage::disk('public')->allFiles($path);
        foreach($files as $file){
        $infos=pathinfo($file);
        $filename=$infos['filename'];
        $extension=$infos['extension'];
        set_time_limit(0);
           if ($extension=="mkv"||$extension=="mp4"){
            $ffmpeg=public_path('storage\ffmpeg\bin\ffmpeg');
            $videofile="\"".$file."\"";
            $imagefile=public_path('storage\thumbnails\\').$filename.'.jpg';
            $size="200x200";
            $getFromSecond=100;
            $cmd="$ffmpeg -i $videofile -an -ss $getFromSecond -s $size -y \"$imagefile\"";
           shell_exec($cmd);
            echo($videofile);

           }
        }
      
        
       
    }

   
}
