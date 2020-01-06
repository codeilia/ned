<?php

namespace App\Http\Controllers;

use App\Models\MartialInfo;
use App\Models\Soldier;
use Illuminate\Http\Request;

class MartialInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MartialInfo  $martialInfo
     * @return \Illuminate\Http\Response
     */
    public function show(MartialInfo $martialInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MartialInfo  $martialInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(MartialInfo $martialInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Soldier $soldier
     * @return Soldier
     */
    public function update(Request $request, Soldier $soldier)
    {

        MartialInfo::updateOrCreate(
            ['soldier_id' => $soldier->id],
            $request->except('soldier')
        );

        return $soldier->load('martialInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MartialInfo  $martialInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MartialInfo $martialInfo)
    {
        //
    }
}
