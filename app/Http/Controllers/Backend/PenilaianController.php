<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DataTables;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Jobs::select('*')->orderBy('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                        $btn = '<a href="'.route('penilaian.show', $row->id).'" class="btn btn-sm btn-primary js-bs-tooltip-enabled"><i class="fa fa-eye"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.penilaian.index');
    }


        /**
    * create
    *
    * @return View
    */
<<<<<<< HEAD
    public function show($id): View
    {
        // get data engineer
        // $engineer = DB::table('users')
        //     ->join('kelas', 'users.divisi', '=', 'kelas.id')
        //     ->select('users.name', 'kelas.id')
        //     ->where('users.divisi', '=', auth()->user()->divisi)
        //     ->get();

        return view('backend.penilaian.detail');
=======
    public function show(Request $request, $id)
    {

        if ($request->ajax()) {

            $data = Penilaian::select('*')->where('id_jobs', $request->id)->orderBy('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                        $btn = '<a href="'.route('penilaian.edit', $row->id).'" class="btn btn-sm btn-primary js-bs-tooltip-enabled"><i class="fa fa-pencil-alt"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.penilaian.detail', compact(['id']));
>>>>>>> 2e08166689e9868067b5dead7608251d37583eba
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    // public function store(Request $request): RedirectResponse
    // {

    //     // validate data from request object before storing it in database table
    //     $validate = $request->validate([
    //         'tanggal'               => ['required'],
    //         'jenis'                 => ['required'],
    //         'masalah'               => ['required'],
    //         'uraian-permasalahan'   => ['required'],
    //         'solusi'                => ['required'],
    //         'keterangan'            => ['required'],
    //         'user'                  => ['required'],
    //         'status'                => ['required'],
    //         'engineer'              => ['required'],
    //     ]);

    //     // insert data into database table
    //     Report_it::create([
    //         'tanggal'               => $validate['tanggal'], 
    //         'jenis'                 => $validate['jenis'],
    //         'masalah'               => $validate['masalah'],
    //         'uraian_permasalahan'   => $validate['uraian-permasalahan'],
    //         'solusi'                => $validate['solusi'],
    //         'keterangan'            => $validate['keterangan'],
    //         'user'                  => $validate['user'],
    //         'status'                => $validate['status'],
    //         'engineer'              => implode( ',', $validate['engineer'] ),
    //     ]);

    //     return redirect()->route('report.index')->with(['success' => 'Data Berhasil Disimpan!']);

    // }
}
