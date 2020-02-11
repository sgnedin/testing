<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $table = 'objects';

    protected $fillable = [
        'name',
        'type_id',
        'invent_number',
        'zavod_number',
        'amortization',
        'active_cost',
        'arrival_date',
        'last_service_date',
        'address_id',
        'floor_id',
        'cabinet'
    ];
}
