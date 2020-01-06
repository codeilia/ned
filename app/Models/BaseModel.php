<?php

namespace App\Models;

use App\Nedsa\Helpers\CustomDateTime;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return CustomDateTime::toJalali($value);
    }

//    public function setCreatedAtAttribute($value)
//    {
//        return CustomDateTime::toGreg($value);
//    }

    public function getUpdatedAtAttribute($value)
    {
        return CustomDateTime::toJalali($value);
    }

//    public function setUpdatedAtAttribute($value)
//    {
//        return CustomDateTime::toGreg($value);
//    }
}
