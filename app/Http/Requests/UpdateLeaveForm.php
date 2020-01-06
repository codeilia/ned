<?php

namespace App\Http\Requests;

use App\Models\Leave;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveForm extends ResponsiveFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function persist()
    {
        $leave = Leave::findOrFail($this->leave);
        $leave->update($this->all());
        $this->result = $leave->findOrFail($this->leave);
        return $this;
    }
}
