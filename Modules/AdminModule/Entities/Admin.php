<?php

namespace Modules\AdminModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;
    protected $table = "admins";
    protected $guard = 'admin';
    protected $guarded = [];
    public $timestamps = true;

    protected $hidden = [
       'created_at','updated_at','deleted_at'
    ];
}
