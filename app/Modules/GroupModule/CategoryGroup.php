<?php

namespace GroupModule;

use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    protected $fillable = ['group_id', 'category_id'];
}
