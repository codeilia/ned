<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends BaseModel
{
    protected $guarded = [];

    public function soldiers()
    {
        return $this->hasManyThrough(Soldier::class, MartialInfo::class);
    }
}
