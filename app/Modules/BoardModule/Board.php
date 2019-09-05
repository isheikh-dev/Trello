<?php

namespace BoardModule;

use Illuminate\Database\Eloquent\Model;
use BoardModule\BoardUser; 
use UserModule\User;
class Board extends Model
{
    protected $fillable = ['title'];

    public function users(){
        return  $this->belongsToMany(User::class, 'board_users', 'board_id');
    }
}
