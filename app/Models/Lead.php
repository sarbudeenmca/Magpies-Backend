<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model {
    use HasFactory;
    protected $table = 'leads';
    protected $fillable = [
        'lead_name',
        'company_name',
        'phone_number',
        'mobile_number',
        'email_address',
        'city',
        'country',
        'lead_status',
        'description'
    ];
}
