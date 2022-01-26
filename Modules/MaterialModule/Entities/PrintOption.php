<?php
/************************************شكل الطباعة******************************************** */

namespace Modules\MaterialModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrintOption extends Model
{
    protected $table = "print_options";
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
