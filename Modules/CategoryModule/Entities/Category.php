<?php
/************************************المنتجات******************************************** */

namespace Modules\CategoryModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MaterialModule\Entities\Color;
use Modules\MaterialModule\Entities\Cover;
use Modules\MaterialModule\Entities\CutStyle;
use Modules\MaterialModule\Entities\FinishDirection;
use Modules\MaterialModule\Entities\FinishOption;
use Modules\MaterialModule\Entities\FoldNumber;
use Modules\MaterialModule\Entities\FoldPocket;
use Modules\MaterialModule\Entities\Glue;
use Modules\MaterialModule\Entities\PaperSize;
use Modules\MaterialModule\Entities\PaperType;
use Modules\MaterialModule\Entities\PrintOption;

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

    public function finishDirections()
    {
        return $this->belongsToMany(FinishDirection::class);
    }

    public function finishOptions()
    {
        return $this->belongsToMany(FinishOption::class);
    }

    public function paperSizes()
    {
        return $this->belongsToMany(PaperSize::class);
    }

    public function paperTypes()
    {
        return $this->belongsToMany(PaperType::class);
    }

    public function printOptions()
    {
        return $this->belongsToMany(PrintOption::class);
    }

    public function covers()
    {
        return $this->belongsToMany(Cover::class);
    }

    public function foldPockets()
    {
        return $this->belongsToMany(FoldPocket::class);
    }

    public function foldNumbers()
    {
        return $this->belongsToMany(FoldNumber::class);
    }

    public function glues()
    {
        return $this->belongsToMany(Glue::class);
    }

    public function cutStyles()
    {
        return $this->belongsToMany(CutStyle::class);
    }
}
