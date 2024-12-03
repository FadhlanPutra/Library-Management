<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Log;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $users = User::paginate(10);
        $search = $request->input('search');

        $users = User::where('name', 'like', '%' . $search . '%')->latest()->paginate(10);
        return view('users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'anggota',
        ]);

        Log::create([
            'level_log' => 'INFO',
            'user' => Auth::user()->name,
            'message' => 'Menambahkan Data User',
            'judul_buku' => 'User: '. $request->name,
            'role' => Auth::user()->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Anggota Berhasil Ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        $user = User::findOrFail($id);

        Log::create([
            'level_log' => 'WARNING',
            'user' => Auth::user()->name,
            'message' => 'Mengubah Informasi User',
            'judul_buku' => 'User: '. $request->name,
            'role' => Auth::user()->role,
        ]);

        $user->update($request->all());
    
            return redirect()->route('users.index')->with('success', 'Data User Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        Log::create([
            'level_log' => 'WARNING',
            'user' => Auth::user()->name,
            'message' => 'Menghapus User',
            'judul_buku' => 'User: '. $user->name,
            'role' => Auth::user()->role,
        ]);

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Akun Berhasil Dihapus');
    }
}
