<?php

namespace Modules\CategoryModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MaterialModule\Entities\Color;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at',
    ];

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
