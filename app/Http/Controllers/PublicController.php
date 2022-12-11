<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function hash($enlace)
    {

        $user = User::where('enlace', '=', $enlace)->first();
        if ($user == null) {
            abort(404);
        }
        return view('public')->with('user', $user);
    }
}
