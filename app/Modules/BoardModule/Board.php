<?php

namespace BoardModule;

use BoardModule\BoardUser;
use Illuminate\Database\Eloquent\Model;
use UserModule\User;
class Board extends Model
{
    protected $fillable = ['title'];

    public function users(){
        return  $this->belongsToMany(User::class)->using(BoardUser::class);
    }
}
