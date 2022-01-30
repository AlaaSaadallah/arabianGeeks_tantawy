<?php
/************************************نوع الورق******************************************** */

namespace Modules\MaterialModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaperType extends Model
{
    protected $table = "paper_types";
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function paperSizesForType()
    {
        return $this->belongsToMany(PaperSize::class);
    }
}
