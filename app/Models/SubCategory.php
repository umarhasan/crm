<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded=[];
    protected $table ='sub_categories';
    use HasFactory;


    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
