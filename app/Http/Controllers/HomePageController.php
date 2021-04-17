<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomePageController extends Controller
{
    function data() {
        $users = User::select('id', 'name', 'email')->get();
        $data = [
            'users' => $users
        ];
        return view('home', $data);
    }
}
