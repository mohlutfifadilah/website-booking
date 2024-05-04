<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $identitas = Identitas::all();
        return view('admin.identitas.index', compact('identitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.identitas.create');
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

        if (is_null($request->identitas)) {
            return redirect()->route('identitas.create')->with('error', 'Jenis Identitas harus diisi');
        }

        Identitas::create([
            'jenis_identitas' => $request->identitas,
        ]);

        return redirect()->route('identitas.index');
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
        $identitas = Identitas::find($id);
        return view('admin.identitas.edit', compact('identitas'));
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

        $identitas = Identitas::find($id);

        if (is_null($request->identitas)) {
            return redirect()->route('identitas.edit', $id)->with('error', 'Jenis Identitas harus diisi');
        }

        $identitas->update([
           'jenis_identitas' => $request->identitas,
        ]);

        return redirect()->route('identitas.index');
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
        $identitas = Identitas::find($id);
        $identitas->delete();

        return redirect()->route('identitas.index');
    }
}
