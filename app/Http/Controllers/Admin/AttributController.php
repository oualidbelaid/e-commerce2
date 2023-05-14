<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribut;
use Illuminate\Http\Request;

class AttributController extends Controller
{

    public function index()
    {
        $att_a = Attribut::all();
        return view('admin/attributs.index')->with('attributs', $att_a);

    }

    /**
     * Show The form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        Attribut::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'The attribut created');

    }

    /**
     * Display The specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show The form for editing The specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update The specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        $att = Attribut::find($id);
        $att->name = $request->name;
        $att->save();
        return redirect()->back()->with('success', 'The attribut udated');

    }

    /**
     * Remove The specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $att = Attribut::find($id);
        $name = $att->name;
        $att->destroy($id);
        return redirect()->back()->with('success', 'The attribut ' . $name . 'deleted');

    }
}
