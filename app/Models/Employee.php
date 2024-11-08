<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [];

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }

    public function requestRecords()
    {
        return $this->hasMany(RequestRecord::class, 'employee_id');
    }
}
