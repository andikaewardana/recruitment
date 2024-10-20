<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DivisiController extends Controller
{
        /**
    * index
    *
    * @return View
    */
    public function index(): View
    {
        $data = Divisi::latest()->get();

        return view('backend.divisi.index', compact('data'));
    }


    /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        return view('backend.divisi.add');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return RedirectResponse
    */
    public function store(Request $request): RedirectResponse
    {

        $validate = $request->validate([
            'nama'  => ['required'],
        ]);

        $divisi = new divisi;
 
        $divisi->nama = $validate['nama'];
 
        $divisi->save();

        return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    
    /**
    * edit
    *
    * @param  mixed $id
    * @return View
    */
    public function edit(string $id): View
    {
        $data = Divisi::findOrFail($id);
        return view('backend.divisi.edit', compact('data'));
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
            'nama'  => ['required'],
        ]);

        $divisi = Divisi::find($id);
 
        $divisi->nama = $validate['nama'];
        
        $divisi->save();

        return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
    * destroy
    *
    * @param  mixed $post
    * @return void
    */
    public function destroy($id): RedirectResponse
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();
        return redirect()->route('divisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
