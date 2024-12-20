<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class MahasantriiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantrii = DB::table('mahasantrii') //join tabel dengan Query Builder Laravel
            ->join('dosen', 'dosen.id', '=', 'mahasantrii.dosen_id')
            ->join('jurusan', 'jurusan.id', '=', 'mahasantrii.jurusan_id')
            ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
            ->select('mahasantrii.*', 'dosen.nama AS dos', 'jurusan.nama AS jur',
                    'matakuliah.nama AS mat')->get();
        return view('mahasantrii.index',compact('ar_mahasantrii'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mengarahkan Ke FORM Create
        return view('mahasantrii.c_buku');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. Tangkap Data
        DB::table('mahasantrii')->insert(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'dosen_id'=>$request->dosen_id,
                'jurusan_id'=>$request->jurusan_id,
                'matakuliah_id'=>$request->matakuliah_id,
            ]
        );

        //2. setelah input data arahkan ke/buku
        return redirect()->route('mahasantrii.index')->with('success', 'Data Mahasantri Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasantrii = DB::table('mahasantrii')
        ->join('dosen', 'mahasantrii.dosen_id', '=', 'dosen.id')
        ->join('jurusan', 'mahasantrii.jurusan_id', '=', 'jurusan.id')
        ->join('matakuliah', 'mahasantrii.matakuliah_id', '=', 'matakuliah.id')
        ->select('mahasantrii.*', 'dosen.nama AS dos', 'jurusan.nama AS jur', 'matakuliah.nama AS mat')
        ->where('mahasantrii.id', $id)
        ->first();

    return view('mahasantrii.show', compact('mahasantrii'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //mengarahkan ke halaman form edit
         $data = DB::table('mahasantrii')->where('id','=',$id)->get();
         return view('mahasantrii.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //mengarahkan ke halaman update
        DB::table('mahasantrii')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'dosen_id'=>$request->dosen_id,
                'jurusan_id'=>$request->jurusan_id,
                'matakuliah_id'=>$request->matakuliah_id,
            ]
        );

        return redirect('/mahasantrii');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Menghapus Data
        DB::table('mahasantrii')->where('id',$id)->delete();
        return redirect('/mahasantrii');
    }
}
