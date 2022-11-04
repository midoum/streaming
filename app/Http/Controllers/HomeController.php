<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;

class HomeController extends BaseController
{
    function __construct(){
        $path= public_path('storage\videos');
        $files = File::allFiles($path);
        
      
        $vlc='C:\Program Files\VideoLAN\VLC\vlc.exe';
        
        return view('welcome')->with('files',$files);
    }

    function play(){
      $file=$_GET['file'];
    
      $vlc='C:\Program Files\VideoLAN\VLC\vlc.exe';
  
      pclose(popen("start \"$vlc\" \"$file\"", "r"));
      
      return redirect('streaming/streaming/public');
    }
    
}
