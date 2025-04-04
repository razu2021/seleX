<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];



    public function images()  {
        return $this->hasMany(Seo_image::class);
    }
}
