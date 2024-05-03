<?php

namespace App\Http\Controllers;

use App\Models\Kewarganegaraan;
use Illuminate\Http\Request;

class KewarganegaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kw = Kewarganegaraan::all();
        return view('admin.kewarganegaraan.index', compact('kw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.kewarganegaraan.create');
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
        if (is_null($request->kewarganegaraan)) {
            return redirect()->route('kewarganegaraan.create')->with('error', 'Jenis Kewarganegaraan harus diisi');
        }

        Kewarganegaraan::create([
            'jenis_kewarganegaraan' => $request->kewarganegaraan,
        ]);

        return redirect()->route('kewarganegaraan.index');
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
        $kw = Kewarganegaraan::find($id);
        return view('admin.kewarganegaraan.edit', compact('kw'));
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
        $kw = Kewarganegaraan::find($id);

        if (is_null($request->kewarganegaraan)) {
            return redirect()->route('kewarganegaraan.edit')->with('error', 'Jenis Kewarganegaraan harus diisi');
        }

        $kw->update([
           'jenis_kewarganegaraan' => $request->kewarganegaraan,
        ]);

        return redirect()->route('kewarganegaraan.index');
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
        $kw = Kewarganegaraan::find($id);
        $kw->delete();

        return redirect()->route('kewarganegaraan.index');
    }
}
