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

        // declare bobot
        $bobot = [
            'Data Pelamar' => 0.8,
            'Pendidikan' => 0.6,
            'Wawancara' => 0.6,
            'Pengalaman Kerja' => 0.8,
            'Test Skill' => 0.8,
            'Psikotest' => 0.8,
        ];


        // untuk mendapatkan nilai pelamar
        $penilaian = Penilaian::where('id_jobs', $request->id)->get();
        $pelamar = [];
        foreach ($penilaian as $index => $nilai) {
            $pelamar[$nilai->id] = [
                $nilai->data_pelamar,
                $nilai->pendidikan,
                $nilai->wawancara,
                $nilai->pengalaman_kerja,
                $nilai->test_skill,
                $nilai->psikotest,
            ];
        }

        // Menghitung nilai tertinggi untuk setiap kriteria
        $nilai_tertinggi = [];

        // Inisialisasi array untuk menyimpan nilai tertinggi
        foreach ($bobot as $k => $v) {
            $nilai_tertinggi[$k] = 0; // Set nilai tertinggi awal ke 0
        }

        // Mencari nilai tertinggi
        foreach ($pelamar as $nama => $nilai) {
            foreach ($bobot as $k => $v) {
                $index = array_search($k, array_keys($bobot)); // Mendapatkan index kriteria
                if ($nilai[$index] > $nilai_tertinggi[$k]) {
                    $nilai_tertinggi[$k] = $nilai[$index]; // Update nilai tertinggi
                }
            }
        }

        // Menghitung Matrix R
        $matrixR = [];
        foreach ($pelamar as $nama => $nilai) {
            $matrixR[$nama] = [];
            foreach ($nilai as $kriteria => $nilaiPelamar) {
                $kunciKriteria = array_keys($nilai_tertinggi)[$kriteria];
                $matrixR[$nama][$kunciKriteria] = $nilaiPelamar / $nilai_tertinggi[$kunciKriteria];
            }
        }

        // Menghitung Matrix R * Bobot
        $total_nilai = [];
        foreach ($matrixR as $nama => $nilai) {
            $total = 0;
            foreach ($nilai as $kriteria => $matrixValue) {
                // Menghitung hasil Matrix R * Bobot
                $total += $matrixValue * $bobot[$kriteria];
            }
            $total_nilai[$nama] = round($total, 1);
        }

        foreach ($total_nilai as $nama => $nilai) {
            $updateNilai = Penilaian::findOrFail($nama);
            $updateNilai->update([
                'nilai_akhir'      => $nilai,
            ]);
        }

        $nilaiTinggi = Penilaian::select('nama_pelamar')->where('id_jobs', $request->id)->orderBy('nilai_akhir', 'DESC')->get();
        $skillTinggi = Penilaian::select('nama_pelamar')->where('id_jobs', $request->id)->orderBy('test_skill', 'DESC')->orderBy('nilai_akhir', 'DESC')->get();

        return response()->json([
            'nilaiTinggi' => $nilaiTinggi,
            'skillTinggi' => $skillTinggi
        ]);

    }
}
