<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $appends = ['disabled'];
    public function getDisabledAttribute()
    {
        return true;
    }
}
