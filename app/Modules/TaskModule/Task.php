<?php

namespace TaskModule;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'complete'];
}
