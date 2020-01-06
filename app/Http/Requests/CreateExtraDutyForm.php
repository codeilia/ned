<?php

namespace App\Http\Requests;

use App\Models\Soldier;
use App\Vamyar\Contracts\ResponsiveFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateExtraDutyForm extends ResponsiveFormRequest
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
        $soldier = Soldier::findOrFail($this->soldier);
        $this->result = $soldier->extraDuties()->create($this->except('soldier'));
        return $this;
    }
}
