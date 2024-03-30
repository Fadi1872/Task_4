<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_admin', 0)->select('id', 'name', 'email', 'created_at', 'updated_at')->get();
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->select('id', 'name', 'email')->get();
        return view('Admin.Edit', compact("user"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('users.index');
    }

    // show the form for updateing the user password

    public function editPassword(string $id)
    {
        $user = User::where('id', $id)->select('id', 'name')->get();
        return view('Admin.changepassword', compact('user'));
    }

    // updateing the user password

    public function updatePassword(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|string|min:8|max:255|confirmed'
        ]);

        User::where('id', $id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('users.index');
    }
}
