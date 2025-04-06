<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $guarded = [];



    public function images()  {
        return $this->hasMany(Seo_image::class);
    }
}
