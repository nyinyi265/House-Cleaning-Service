<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class scheduleEmployee extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'shift_start',
        'shift_end'
    ];

    // protected $table = 'schedule_employees';
}
