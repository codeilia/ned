<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartialInfo extends BaseModel
{
    protected $guarded = [];

    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
}
