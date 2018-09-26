<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    //
    protected $fillable = ['name_note','qualification','percentage'];

    public function Subject(){
        return $this->belongsto(Subject::class);
    }
}
