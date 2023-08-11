<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSections extends Model
{
    use HasFactory;
    protected $table ='sections';
    protected $guarded =[];

    public function page()
    {
        return $this->hasOne(PageCategory::class,'id','page_id');
    }
}
