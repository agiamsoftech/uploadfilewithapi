<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docfile;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    function upload(Request $req)
    {           
        
        $result = $req->file('image_file')->store('apiDocs');
        $docs = new Docfile();
        $docs->image = $result;
        $docs->user_id = Auth::id();
        $docs->save();

        return ['result'=>$docs];        
        
    }
}
