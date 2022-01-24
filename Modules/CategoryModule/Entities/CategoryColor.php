<?php

namespace Modules\CategoryModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryColor extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\CategoryModule\Database\factories\CategoryColorFactory::new();
    }
}
