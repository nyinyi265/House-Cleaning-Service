<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable=[
        'equipment_name',
        'maintenance_date',
        'equipment_category',
        'condition_status'
    ];

    public function essentialEquipments(){
        return $this->belongsToMany(service::class, 'required_equipments', 'equipment_id', 'service_id')->using(requiredEquipment::class)->withPivot('quantity')->withTimestamps();
    }
}
