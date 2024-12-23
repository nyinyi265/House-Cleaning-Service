<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    use HasFactory;

    public function promotedServices(){
        return $this->belongsToMany(service::class, 'promotion_services', 'promotion_id', 'service_id');
    }
}
