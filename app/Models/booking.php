<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'u_id',
        'service_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'u_id');
    }

    public function service(){
        return $this->belongsTo(service::class, 'service_id');
    }

    public function employees(){
        return $this->belongsToMany(employee::class, 'schedules', 'booking_id', 'employee_id')->withPivot('id','date');
    }
}
