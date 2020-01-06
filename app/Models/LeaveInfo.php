<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveInfo extends BaseModel
{
    protected $guarded = [];

    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
}
