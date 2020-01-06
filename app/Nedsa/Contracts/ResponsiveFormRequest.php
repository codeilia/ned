<?php
/**
 * Created by PhpStorm.
 * User: binaco
 * Date: 6/19/2018
 * Time: 4:07 PM
 */

namespace App\Vamyar\Contracts;



use App\Nedsa\Contracts\PersistsForm;
use App\Nedsa\Contracts\Resultable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

abstract class ResponsiveFormRequest extends FormRequest implements PersistsForm, Resultable
{
    protected $result;

    public function result()
    {
        return $this->result;
    }
}
