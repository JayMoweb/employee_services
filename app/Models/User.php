<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table ="users";

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function technology() {
        
        return $this->belongsToMany(EmployeeMaster::class,'framework_employee_mapping','user_id','framework_id');
    }

    public function getTechnologyFormattedAttribute(){
        
        return implode(', ', $this->technology->pluck('framework_name')->toArray());

    }
}
