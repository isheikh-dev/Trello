<?php

namespace UserModule;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\BoardUser;
use BoardModule\Board;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;
 
    protected $fillable = [
        'name', 'email', 'password'
    ];

     
    protected $hidden = [
        'password', 'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 
    
    public function setPasswordAttribute($attribute){
        $this->attributes['password'] = bcrypt($attribute);
    }
    public function boards(){
        return $this->belongsToMany(Board::class, 'board_users', 'user_id');
    }
}
