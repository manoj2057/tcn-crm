<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lead extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function source(){
        return $this->belongsTo(Source::class, 'source_id');
    }
}
