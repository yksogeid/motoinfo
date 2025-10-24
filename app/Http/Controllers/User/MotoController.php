<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MotoController extends Controller
{
    public function index()
    {
        return view('user.motos.index');
    }
}
