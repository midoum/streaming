<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{

    function __construct(){
        $path= 'storage/videos/shows';
        $directories = Storage::disk('public')->Directories($path);
        
      
        $vlc='C:\Program Files\VideoLAN\VLC\vlc.exe';
        
        return view('shows')->with('directories',$directories);
    }

    function play(){
      $file=$_GET['file'];
      $dir=$_GET['dir'];
     
      $vlc='C:\Program Files\VideoLAN\VLC\vlc.exe';
  
      pclose(popen("start \"$vlc\" \"$file\"", "r"));
      
      return redirect('streaming/streaming/public/season?dir='.$dir);
    }
    function show_season(){
      $dir=$_GET['dir'];
      $path= $dir;
        $files = Storage::disk('public')->allFiles($path);
        $data=[
          'files'=>$files,
          'dir'=>$dir,

        ];
        return view('single_season',$data);
    }
}
