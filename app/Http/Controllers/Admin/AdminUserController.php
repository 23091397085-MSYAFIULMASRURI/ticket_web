<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:user,organizer,admin',
        ]);
        User::create($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User created.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,organizer,admin',
        ]);
        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }

    public function showOrganizerRequests()
    {
        $requests = \App\Models\User::where('is_requesting_organizer', true)
            ->where('role', 'user')
            ->get();

        return view('admin.organizer_requests', compact('requests'));
    }

    public function approveOrganizer(User $user)
    {
        $user->role = 'organizer';
        $user->is_requesting_organizer = false;
        $user->save();

        return redirect()->back()->with('success', 'User telah menjadi organizer.');
    }
}
