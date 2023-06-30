<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        return view('users.show', compact('user'));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        return view('users.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $data = $request->all();

        // Create a new user
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'role' => $data['role']
        ]);


        // Redirect or show a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        // Update the user
        $user->update($validatedData);

        // Redirect or show a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }
        // Delete the user
        $user->delete();

        // Redirect or show a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
