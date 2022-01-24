<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pulsa;
class PulsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pulsa = Pulsa::all();

        return view('index', compact('pulsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomber' => 'required|max:255',
            'provider' => 'required|alpha_num',
            'nominal' => 'required|numeric',
        ]);
        $pulsa = Pulsa::create($validatedData);
   
        return redirect('/pulsa')->with('success', 'Data is successfully saved');
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
        $pulsa = Pulsa::findOrFail($id);

        return view('edit', compact('pulsa'));
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
        $validatedData = $request->validate([
            'nomber' => 'required|max:255',
            'provider' => 'required|alpha_num',
            'nominal' => 'required|numeric',
        ]);
        Pulsa::whereId($id)->update($validatedData);

        return redirect('/pulsa')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pulsa = Pulsa::findOrFail($id);
        $pulsa->delete();

        return redirect('/pulsa')->with('success', 'Data is successfully deleted');
    }
}
