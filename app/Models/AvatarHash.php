<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvatarHash extends Model
{
    protected $guarded = [];

    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }
}
