<?php

namespace CategoryModule;

use Illuminate\Database\Eloquent\Model;

class BoardCategory extends Model
{
    protected $fillable = ['board_id', 'category_id'];
}
