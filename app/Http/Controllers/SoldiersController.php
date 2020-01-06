<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSoldierForm;
use App\Http\Requests\UpdateSoldierForm;
use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldiersController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('convertToGreg')->only('store', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $soldiers = Soldier::with(
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        )->get();



        if ($soldiers->isEmpty()) {
            return $this->respondNotFound();
        }

        return $this->respondWithData($soldiers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSoldierForm $form
     * @return mixed
     */
    public function store(CreateSoldierForm $form)
    {
        $soldier = $form->persist()->result();
        return $this->respondCreated(
            $message = 'مشخصات سرباز با موفقیت ثبت شد',
            $soldier
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soldier  $soldier
     * @return \Illuminate\Http\Response
     */
    public function show(Soldier $soldier)
    {
        $soldier->load([
            'martialInfo',
            'leaveInfo',
            'leaves',
            'extraDuties',
            'extraDuties',
            'absences',
            'shortages'
        ]);

        return $this->respondWithData($soldier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSoldierForm $form
     * @return mixed
     */
    public function update(UpdateSoldierForm $form)
    {
        $soldier = $form->persist()->result();

        return $this->respondUpdated(
            'اطلاعات سرباز با موفقیت ویرایش شد',
            $soldier
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soldier $soldier
     * @return void
     */
    public function destroy(Soldier $soldier)
    {
        $this->respondNotFound();
    }
}
