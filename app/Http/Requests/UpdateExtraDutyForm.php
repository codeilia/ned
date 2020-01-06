<?php

namespace App\Http\Requests;

use App\Models\ExtraDuty;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExtraDutyForm extends ResponsiveFormRequest
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
        $extraDuty = ExtraDuty::findOrFail($this->extraDuty);
        $this->result = $extraDuty->update($this->all());
        return $this;
    }
}
