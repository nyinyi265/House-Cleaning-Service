<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category',
    ];

    public function serviceCategories(){
        return $this->hasMany(service::class);
    }
}
