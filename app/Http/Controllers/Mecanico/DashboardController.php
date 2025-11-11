<?php

namespace App\Http\Controllers\Mecanico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mecanico.dashboard');
    }
}