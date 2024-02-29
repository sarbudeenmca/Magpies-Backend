<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model {
    use HasFactory;
    protected $table = 'deals';
    protected $fillable = [
        'lead_id',
        'service_type',
        'estimated_price',
        'follow_up',
        'status'
    ];
}
