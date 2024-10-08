<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
      return  $this->belongsToMany(permission::class);
    }

    public function hasPermission($permission)
    {
      return  $this->permissions()->where('title' ,$permission)->exists();
    }

    public static function FindByTitle($title)
    {
        return self::query()->where('title',$title)->firstOrFail();
    }
}
