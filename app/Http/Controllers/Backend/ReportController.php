<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report_it;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use DataTables;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Report_it::select('*')->orderBy('created_at', 'desc');


            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                        $btn = '<a href="javascript:void(0)" class="btn btn-sm btn-primary js-bs-tooltip-enabled"><i class="fa fa-pencil-alt"></i></a> <a href="javascript:void(0)" class="btn btn-sm btn-danger js-bs-tooltip-enabled"><i class="fa fa-times"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.report_it.index');
    }


        /**
    * create
    *
    * @return View
    */
    public function create(): View
    {
        // get data engineer
        $engineer = DB::table('users')
            ->join('kelas', 'users.divisi', '=', 'kelas.id')
            ->select('users.name', 'kelas.id')
            ->where('users.divisi', '=', auth()->user()->divisi)
            ->get();

        return view('backend.report_it.add', compact('engineer'));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        // validate data from request object before storing it in database table
        $validate = $request->validate([
            'tanggal'               => ['required'],
            'jenis'                 => ['required'],
            'masalah'               => ['required'],
            'uraian-permasalahan'   => ['required'],
            'solusi'                => ['required'],
            'keterangan'            => ['required'],
            'user'                  => ['required'],
            'status'                => ['required'],
            'engineer'              => ['required'],
        ]);

        // insert data into database table
        Report_it::create([
            'tanggal'               => $validate['tanggal'], 
            'jenis'                 => $validate['jenis'],
            'masalah'               => $validate['masalah'],
            'uraian_permasalahan'   => $validate['uraian-permasalahan'],
            'solusi'                => $validate['solusi'],
            'keterangan'            => $validate['keterangan'],
            'user'                  => $validate['user'],
            'status'                => $validate['status'],
            'engineer'              => implode( ',', $validate['engineer'] ),
        ]);

        return redirect()->route('report.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}
