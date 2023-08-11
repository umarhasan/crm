<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];

    public function subcategory()
    {
        return $this->hasOne(SubCategory::class,'id','subcat_id');
    }
    
    public function subcat()
    {
        return $this->hasMany(SubCategory::class,'id','subcat_id');
    }
    
    public function size()
    {
        return $this->hasMany(VeriantSize::class,'product_id','id');
    }
    
    public function color()
    {
        return $this->hasMany(VeriantColor::class,'product_id','id');
    }
    
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
