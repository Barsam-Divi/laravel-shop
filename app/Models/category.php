<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function parent()
    {
      return $this->belongsTo(category::class , 'parent_id');

    }

    public function children()
    {
        return $this->hasMany(category::class,'parent_id');
    }

    public function products()
    {
        return $this->hasMany(product::class);
    }

    public function GetAllSubCategoriesProducts()
    {

        $childrenId = $this->children()->pluck('id');

        return product::query()->whereIn('category_id',$childrenId)->orWhere('category_id',$this->id)->get();


    }

    public function getHasChildrenAttribute()
    {
        return $this->children()->count() > 0;
    }

    public function propertyGroups()
    {
        return $this->belongsToMany(PropertyGroup::class);
    }

    public function hasPropertyGroup($title)
    {
        return $this->propertyGroups()->where('title',$title)->exists();
    }


}
