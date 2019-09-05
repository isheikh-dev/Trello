<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardUser extends Model
{
    protected $table = 'board_users';
    protected $fillable = ['user_id', 'board_id', 'created_at', 'upadated_at'];
}
