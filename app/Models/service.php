<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'description',
        'cost',
        'service_image',
        'category_id'
    ];

    public function bookings(){
        return $this->hasMany(booking::class, 'service_id');
    }

    public function needEquipmentForServices(){
        return $this->belongsToMany(equipment::class, 'required_equipments', 'service_id', 'equipment_id')->using(requiredEquipment::class)->withPivot('quantity')->withTimestamps();
    }

    public function serviceGotPromotions(){
        return $this->belongsToMany(promotion::class, 'promotion_services', 'service_id', 'promotion_id');
    }

    public function category(){
        return $this->belongsTo(ServiceCategory::class);
    }
}
