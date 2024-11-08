<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $guarded = [];
    protected $casts = [
        'date' => 'datetime',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
