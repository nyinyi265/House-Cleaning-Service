<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
      'customer_id',
      'message',
      'inquery_type'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }
}
