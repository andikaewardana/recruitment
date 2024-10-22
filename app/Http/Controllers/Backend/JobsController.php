<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JobsController extends Controller
{
        /**
    * index
    *
    * @return View
    */
    public function index(): View
    {
        $data = Jobs::latest()->get();

        return view('backend.jobs.index', compact('data'));
    }


    /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        return view('backend.jobs.add');
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

        $jobs = new jobs;
        $jobs->nama = $validate['nama'];
        $jobs->save();

        return redirect()->route('jobs.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    
    /**
    * edit
    *
    * @param  mixed $id
    * @return View
    */
    public function edit(string $id): View
    {
        $data = Jobs::findOrFail($id);
        return view('backend.jobs.edit', compact('data'));
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

        $jobs = Jobs::find($id);
        $jobs->nama = $validate['nama'];
        $jobs->save();

        return redirect()->route('jobs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
    * destroy
    *
    * @param  mixed $post
    * @return void
    */
    public function destroy($id): RedirectResponse
    {
        $jobs = Jobs::findOrFail($id);
        $jobs->delete();
        return redirect()->route('jobs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
