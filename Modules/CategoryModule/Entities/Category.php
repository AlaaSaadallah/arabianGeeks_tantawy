<?php

namespace Modules\CategoryModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at',
    ];
}
