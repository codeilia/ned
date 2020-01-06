<?php

namespace App\Http\Requests;

use App\Models\Absence;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsenceForm extends ResponsiveFormRequest
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
        $absence = Absence::findOrFail($this->absence);
        $this->result = $absence->update($this->all());
        return $this;
    }
}
