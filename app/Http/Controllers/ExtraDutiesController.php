<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExtraDutyForm;
use App\Http\Requests\UpdateExtraDutyForm;
use App\Models\ExtraDuty;
use Illuminate\Http\Request;

class ExtraDutiesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $extraDuties = ExtraDuty::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->get();

        if ($extraDuties->isEmpty()) {
            return $this->respondNotFound();
        }

        return $this->respondWithData($extraDuties);
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
     * @param CreateExtraDutyForm $form
     * @return mixed
     */
    public function store(CreateExtraDutyForm $form)
    {
        $extraDuty = $form->persist()->result();

        return $this->respondCreated(
            $message = 'اضافه خدمت برای سرباز مورد نظر ثبت شد',
            $extraDuty
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExtraDuty  $extraDuty
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraDuty $extraDuty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraDuty  $extraDuty
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraDuty $extraDuty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateExtraDutyForm $form
     * @return mixed
     */
    public function update(UpdateExtraDutyForm $form)
    {
        $extraDuty = $form->persist()->result();

        return $this->respondUpdated(
            $message = 'اطلاعات اضافه خدمت مورد نظر با موفقیت ویرایش شد',
            $extraDuty
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraDuty $extraDuty
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ExtraDuty $extraDuty)
    {
        $extraDuty->delete();

        return $this->respondDeleted(
            $message = 'اضافه خدمت مورد نظر با موفقیت حذف شد',
            $extraDuty
        );
    }
}
