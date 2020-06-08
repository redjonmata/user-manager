<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('admin','=',0)->get();
        $ids = implode(',', $users->pluck('id')->toArray());

        return view('users')->with(compact('users','ids'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->input();
        $user = User::find($id);

        if (empty($user)) {
            abort('404');
        }

        $user->update([
            'first_name' => $input['hidden_first_name-'.$id],
            'last_name' => $input['hidden_last_name-'.$id],
            'username' => $input['hidden_username-'.$id],
            'email' => $input['hidden_email-'.$id]
        ]);

        return redirect('/');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!empty($user)) {
            $user->delete();
        }

        return redirect(url('/'));
    }

    public function show()
    {
        return view('add_user');
    }

    public function store(Request $request)
    {
        $validator =  $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $validator['first_name'],
            'last_name' => $validator['last_name'],
            'username' => $validator['username'],
            'email' => $validator['email'],
            'password' => Hash::make($validator['password']),
            'unenc_password' => $validator['password'],
        ]);

        return redirect('/');
    }
}
