<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAbsenceForm;
use App\Http\Requests\UpdateAbsenceForm;
use App\Models\Absence;
use Illuminate\Http\Request;

class AbsencesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $absences = Absence::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->get();

        if ($absences->isEmpty()) {
            return $this->respondNotFound();
        }

        return $this->respondWithData($absences);
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
     * @param CreateAbsenceForm $form
     * @return mixed
     */
    public function store(CreateAbsenceForm $form)
    {
        $absence = $form->persist()->result();

        return $this->respondCreated(
            $message = 'غیبت برای سرباز مورد نظر ثبت شد',
            $absence
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function show(Absence $absence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absence  $absence
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAbsenceForm $form
     * @return mixed
     */
    public function update(UpdateAbsenceForm $form)
    {
        $absence = $form->persist()->result();

        return $this->respondUpdated(
            $message = 'اطلاعات غیبت مورد نظر با موفقیت ویرایش شد',
            $absence
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absence $absence
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();

        return $this->respondDeleted(
            $message = 'غیبت مورد نظر با موفقیت حذف شد',
            $absence
        );
    }
}
