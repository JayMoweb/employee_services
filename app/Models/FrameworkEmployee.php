<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrameworkEmployee extends Model
{
    use HasFactory;
    
    protected $table = 'framework_employee_mapping';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'framework_id',
        'user_id'
    ];
}
