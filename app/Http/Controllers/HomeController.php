<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('home');
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
