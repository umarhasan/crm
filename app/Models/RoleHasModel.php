<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
class RoleHasModel extends Model
{
    use HasFactory;
    protected $table ='role_has_permissions';
    protected $guarded=[];
    public function permission()
    {
        return $this->belongsTo(Permission::class,'id');
    }
}
