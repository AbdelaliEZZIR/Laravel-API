<?php

namespace App\Http\Controllers;

use App\Models\Cantact;
use Illuminate\Http\Request;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cantacts = Cantact::all();
        return new ContactCollection($cantacts);
    }

    /**
     * Show the form for creating a new resource.
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
        $this->validate($request, [
            'nom' => 'required',
            'tel' => 'required',
            'id' => 'required'
        ]);
        $cantact = Cantact::create([
            'nom' => $request->nom,
            'tel' => $request->tel,
            'id' => $request->id
        ]);
        return new ContactResource($cantact);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cantact  $cantact
     * @return \Illuminate\Http\Response
     */
    public function show(Cantact $cantact)
    {
        return new ContactResource($cantact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cantact  $cantact
     * @return \Illuminate\Http\Response
     */
    public function edit(Cantact $cantact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cantact  $cantact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cantact $cantact)
    {
        $this->validate($request, [
            'nom' => 'required',
            'tel' => 'required',
        ]);
        $cantact->update([
            'nom' => $request->nom,
            'tel' => $request->tel,
        ]);
        return response()->json($cantact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cantact  $cantact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cantact $cantact)
    {
        $cantact->delete();
        return response()->json([
            'cantact supprimer'
        ]);
    }
}