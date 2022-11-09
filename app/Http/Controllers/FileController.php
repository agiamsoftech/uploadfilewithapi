<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docfile;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    function upload(Request $req)
    {           

        $user_id = $req->user_id;
        
        $result = $req->file('image_file')->store('apiDocs');
        $docs = new Docfile();
        $docs->image = $result;
        $docs->user_id = $user_id;
        $docs->save();

        return ['result'=>$docs];       
        
    }
}
