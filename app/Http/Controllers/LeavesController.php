<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeaveForm;
use App\Http\Requests\UpdateLeaveForm;
use App\Models\Leave;
use App\Models\Soldier;
use Illuminate\Http\Request;

class LeavesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return  $leaves
     */
    public function index(Request $request)
    {
        $leaves = Leave::with('soldier')->when(isset($request->soldier), function ($query)  use ($request){
            return $query->where('soldier_id', $request->soldier);
        })->get();

        if ($leaves->isEmpty()) {
            return $this->respondNotFound();
        }

        return $this->respondWithData($leaves);
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
     * @param CreateLeaveForm $form
     * @return mixed
     */
    public function store(CreateLeaveForm $form)
    {
        $leave = $form->persist()->result();

        return $this->respondCreated(
            $message = 'اطالاعات مرخصی سرباز مورد نظر با موفقیت ثبت شد',
            $leave
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLeaveForm $form
     * @return mixed
     */
    public function update(UpdateLeaveForm $form)
    {
        $leave = $form->persist()->result();

        return $this->respondUpdated(
            'اطلاعات مرخصی با موفقیت ویرایش شد',
            $leave
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave $leave
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return $this->respondDeleted('مرخصی مورد نظر حذف شد');
    }
}
