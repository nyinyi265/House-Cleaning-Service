<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'phone',
        'email',
        'address',
        'position_id',
    ];

    public function position()  {
        return $this->belongsTo(position::class);
    }

    public function bookings(){
        return $this->belongsToMany(booking::class, 'schedules', 'employee_id', 'booking_id')->withPivot('id','date');
    }
}
