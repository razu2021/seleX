<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $guarded = [];


    /** --- belongs to  */
    public function creator(){
        return $this->belongsTo(Admin::class,'creator_id','id');
    }
    /** --- belongs to  */
    public function editor(){
        return $this->belongsTo(Admin::class,'editor_id','id');
    }



    public function images()  {
        return $this->hasMany(Seo_image::class);
    }


    /** ---- join other model -- */
    
    public function Category(){
        return $this->belongsTo(Category::class,'unique_id','id');
    }
}
