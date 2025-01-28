<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class requiredEquipment extends Pivot
{
    use HasFactory;

    protected $table = 'required_equipments';

    protected $fillable = ['quantity'];

}
