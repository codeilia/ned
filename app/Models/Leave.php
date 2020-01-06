<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends BaseModel
{
    protected $guarded = [];

    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
}
