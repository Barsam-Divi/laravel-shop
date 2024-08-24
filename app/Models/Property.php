<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propertyGroup()
    {
        return $this->belongsTo(PropertyGroup::class);
    }

    public function products()
    {

        return $this->belongsToMany(product::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }
}
