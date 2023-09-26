<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Avatar extends Model
{
    protected $guarded = [];

    public function scopeMale(Builder $query): void
    {
        $query->where('sex', 'm');
    }

    public function scopeFemale(Builder $query): void
    {
        $query->where('sex', 'f');
    }

    public function scopeByString(Builder $query, string $string): void
    {
        $query->where('string', $string);
    }

    public function getIdByHash($md5, $sex = null): int
    {
        if ($sex) {
            $count = $this->where('sex', $sex)->count();
        } else {
            $count = $this->count();
        }

        $numericValue = hexdec($md5);
        $id = ($numericValue % $count) + 1;

        return $id;

    }

}
