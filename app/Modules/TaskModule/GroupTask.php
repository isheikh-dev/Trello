<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTask extends Model
{
    protected $table = 'group_tasks';

    protected $fillable = ['task_id' , 'group_id'];
}
