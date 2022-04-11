<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function departments(){
        return $this->belongsToMany(Department::class, 'customer_departments');
    }
}
