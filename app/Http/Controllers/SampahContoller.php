<?php

namespace App\Http\Controllers;

use App\Charts\WasteChart;
use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sampahs = Sampah::all();

        return view('sampahs.index', compact('sampahs'));

    }

    public function dashboard()
    {
        //
        $sampahs = Sampah::all();
        $sampahData = Sampah::select('berat')->pluck('berat');

        // print_r(json_encode($sampahData));
        return view('dashboard', compact('sampahs', 'sampahData'));

    }

    // public function loadChart(){
    //     $sampahData = Sampah::select('berat')->pluck('berat');

    //     // print_r(json_encode($sampah));
    //     return view('dashboard', compact('sampahData'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sampahs.create');
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
        $request->validate([
            'jenis_sampah' => 'required',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'total_harga' => '',
        ]);

        $input = $request->all();
        $input['total_harga'] = $input['berat'] * $input['harga'];

        Sampah::create($input);

        return redirect()->route('sampahs.index')
        ->with('success','Product created successfully.');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sampah $sampahs,$id)
    {
        //
        // delete data Pengguna
        $sampahs::find($id);
        $sampahs = Sampah::where('id', $id)->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
