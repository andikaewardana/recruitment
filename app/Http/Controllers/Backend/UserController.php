<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Divisi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
    * index
    *
    * @return View
    */
    public function index(): View
    {
        $data = User::latest()->get();
        return view('backend.user', compact('data'));
    }


    /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        $divisi = Divisi::latest()->get();
        return view('backend.user-add', compact('divisi'));
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return RedirectResponse
    */
    public function store(Request $request): RedirectResponse
    {

        // dd($request);
        $validate = $request->validate([
            'username'  => ['required'],
            'email'     => ['required', 'email'],
            'password'  => ['required'],
            'role'      => ['required'],
            'divisi'    => ['required'],
        ]);

        User::insert([
            'name'      => $validate['username'], 
            'email'     => $validate['email'],
            'password'  => Hash::make($validate['password']),
            'role'      => $validate['role'],
            'divisi'    => $validate['divisi'],

        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    
    /**
    * edit
    *
    * @param  mixed $id
    * @return View
    */
    public function edit(string $id): View
    {
        $data = User::findOrFail($id);
        $divisi = Divisi::latest()->get();
        return view('backend.user-edit', compact('data', 'divisi'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $id
    * @return RedirectResponse
    */
    public function update(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'username'  => ['required'],
            'email'     => ['required', 'email'],
            'role'      => ['required'],
            'divisi'    => ['required'],
        ]);

        $user = User::findOrFail($id);

        if ($request['password'] == null) {
            $password = $user->password;
        } else {
            $password = Hash::make($request['password']);
        }

        $user->update([
            'name'      => $validate['username'],
            'email'     => $validate['email'],
            'password'  => $password,
            'role'      => $validate['role'],
            'divisi'    => $validate['divisi'],
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
    * destroy
    *
    * @param  mixed $post
    * @return void
    */
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
