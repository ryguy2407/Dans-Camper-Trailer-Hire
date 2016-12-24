<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = ['id'];

    public function scopeSize($query)
    {
        return $query->where('media_size', $query);
    }
}
