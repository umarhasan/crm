<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    use HasFactory;
    protected $table = 'page_category';
    protected $guarded = ['id'];

    public function page_sections(){
        return $this->hasMany(PageSections::class,'page_id','id');
    }
}
