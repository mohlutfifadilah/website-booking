<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $berita = Berita::all();
        return view('admin.berita.index',compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->file('gambar')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('gambar')->getSize();
            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024 || $fileSize === False) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('gambar', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('gambar');
            $image = $request->file('gambar')->store('gambar');
            $file->move('storage/gambar/', $image);
            $image = str_replace('gambar/', '', $image);
        } else {
            $image = '';
        }

        if (is_null($request->judul)) {
            return redirect()->route('berita.create')->with('judul', 'Judul harus diisi');
        }

        if (is_null($request->isi)) {
            return redirect()->route('berita.create')->with('isi', 'Isi Berita harus diisi');
        }

        Berita::create([
            'gambar' => $image,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('berita.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $berita = Berita::find($id);
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $berita = Berita::find($id);

        if ($request->file('gambar')) {
            // Ambil ukuran file dalam bytes
            $fileSize = $request->file('gambar')->getSize();

            // Periksa apakah ukuran file melebihi batas maksimum (2 MB)
            if ($fileSize > 2 * 1024 * 1024) {
                // File terlalu besar, kembalikan respons dengan pesan kesalahan
                return redirect()->back()->with('gambar', 'Ukuran file tidak lebih dari 2 mb');
            }
            $file = $request->file('gambar');
            $image = $request->file('gambar')->store('gambar');
            $file->move('storage/gambar/', $image);
            $image = str_replace('gambar/', '', $image);
            if($berita->gambar){
                unlink(storage_path('app/gambar/' . $berita->gambar));
                unlink(public_path('storage/gambar/' . $berita->gambar));
            }
        } else {
            $image = $berita->gambar;
        }

        if (is_null($request->judul)) {
            return redirect()->route('berita.edit', $id)->with('judul', 'Judul harus diisi');
        }

        if (is_null($request->isi)) {
            return redirect()->route('berita.edit', $id)->with('isi', 'Isi Berita harus diisi');
        }

        $berita->update([
            'gambar' => $image,
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $berita = Berita::find($id);
        if($berita->gambar){
            unlink(storage_path('app/gambar/' . $berita->gambar));
            unlink(public_path('storage/gambar/' . $berita->gambar));
          }
        $berita->delete();

        return redirect()->route('berita.index');
    }
}
