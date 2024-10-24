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
    public function show(Request $request, $id)
    {

        if ($request->ajax()) {

            $data = Penilaian::select('*')->where('id_jobs', $request->id)->orderBy('created_at', 'desc');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
       
                        $btn = '<button type="button" id="detailPenilaian" class="btn btn-sm btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="modalPenilaian()"><i class="fa fa-pencil-alt"></i></button>';
                        return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.penilaian.detail', compact(['id']));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // validate data from request object before storing it in database table
        $validate = $request->validate([
            'data_pelamar'      => ['required'],
            'pendidikan'        => ['required'],
            'pengalaman_kerja'  => ['required'],
            'seleksi_wawancara' => ['required'],
            'test_skill'        => ['required'],
            'seleksi_psikotest' => ['required'],
        ]);

        $penilaian = Penilaian::find($id);
        $penilaian->data_pelamar        = $validate['data_pelamar'];
        $penilaian->pendidikan          = $validate['pendidikan'];
        $penilaian->pengalaman_kerja    = $validate['pengalaman_kerja'];
        $penilaian->wawancara           = $validate['seleksi_wawancara'];
        $penilaian->test_skill          = $validate['test_skill'];
        $penilaian->psikotest           = $validate['seleksi_psikotest'];
        $penilaian->save();

        return redirect()->route('penilaian.show', $id)->with(['success' => 'Data Berhasil Diubah!']);

    }

    public function calculate(Request $request) {
        // dd($request->id);
        $penilaian = Penilaian::where('id_jobs', $request->id)->get();
        dd($penilaian[0]['id']);
    }
}
