<?php

namespace App\Models;

use App\Nedsa\Helpers\CustomDateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Soldier extends BaseModel
{
    protected $guarded = [];

    public function getBirthdayAttribute($value)
    {
        return CustomDateTime::toJalali($value);
    }

//    public function setBirthdayAttribute($value)
//    {
//        return Carbon::parse(CustomDateTime::toGreg($value));
//    }

    public function unit()
    {
        return $this->hasOne(Unit::class);
    }

    public function martialInfo()
    {
        return $this->hasOne(MartialInfo::class);
    }

    public function leaveInfo()
    {
        return $this->hasOne(LeaveInfo::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function extraDuties()
    {
        return $this->hasMany(ExtraDuty::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function shortages()
    {
        return $this->hasMany(Shortage::class);
    }
}
