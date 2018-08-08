<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronos extends Model
{
    protected $fillable = ['name', 'deadline_start', 'deadline_end', 'progress'];
}
