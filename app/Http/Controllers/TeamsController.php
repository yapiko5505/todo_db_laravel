<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index ()
    {
        return view('teams.login');
    }

    // public function index ()
    // {
        // return view('teams.plan');
    // }
}

// ログイン画面、予定表のコントローラー
