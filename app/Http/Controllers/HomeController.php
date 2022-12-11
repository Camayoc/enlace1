<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('enlace');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = auth()->user();
        return view('home')->with('user', $user);
    }

    public function uploadMini(Request $request){
        $user = auth()->user();
        $file = $request->get('file');
        $extension = explode('/', mime_content_type($file))[1];
        $filename = $user->id.".".$extension;
        $name = Storage::disk('local')->put("public/profile/".$filename,base64_decode(explode(',',$file)[1]));
        $user->profile_filename = $filename;
        $user->save();
        return $this->sendResponse($name);
    }
    public function uploadHeader(Request $request){
        $user = auth()->user();
        $file = $request->get('file');
        $extension = explode('/', mime_content_type($file))[1];
        $filename = $user->id.".".$extension;
        $name = Storage::disk('local')->put("public/header/".$filename,base64_decode(explode(',',$file)[1]));
        $user->header_filename = $filename;
        $user->save();
        return $this->sendResponse($name);
    }

    public function completelink(Request $request)
    {
        $user  = auth()->user();

        if ($user->enlace != null) {
            //return $this->sendError("Ya tienes un enlace");
        }
        $part = $request->get('part');
        if (User::where('enlace', '=', $part)->count() != 0) {
            return $this->sendError("tiene que elegir otro enlace este ya esta ocupado");
        }

        $user->enlace = $part;
        $user->save();

        return $this->sendResponse(null, "Correctamente actualizado");
    }
}
