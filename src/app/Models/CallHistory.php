<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'employee_id',
        'called_at',
        'result',
        'receiver_info',
        'notes',
    ];
}
