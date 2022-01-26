<?php

namespace Modules\MaterialModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    protected $table = "colors";
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
