<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameworkEmployee extends Model
{
    use HasFactory;
    protected $table = 'framework_employee_mapping';

     public function user() {
        return $this->belongsTo(User::class);
    }
}
