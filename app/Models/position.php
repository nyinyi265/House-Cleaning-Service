<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'salary',
        'job_requirements',
    ];

    public function employeesPositions(){
        return $this->hasMany(employee::class);
    }
}
