<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UserMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(UserMiddleware::class);
    }

    public function index()
    {
        $users = User::where('is_admin', 0)->select('name', 'email')->get();
        return view('UsersShow', compact('users'));
    }
}
