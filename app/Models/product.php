<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class product extends Model
{
    use HasFactory;

    protected $guarded = [];



    protected $appends = [
        'cost_with_discount',
        'image_path',
        'brand_name'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function getRouteKeyName()
    {
            return 'slug';
    }

    public function pictures()
    {
        return $this->hasMany(picture::class);
    }

    public function addPictures(Request $request)
    {
        $path = $request->file('image')->storeAs('public/productimage/productGallery',$request->file('image')->getClientOriginalName());

        $this->pictures()->create([
            'path' => $path,
            'mimes' => $request->file('image')->getClientMimeType()
        ]);
    }

    public function deletePicture($picture)
    {

        Storage::delete($picture->path);

        $picture->delete();
    }

    public function discount()
    {
        return $this->hasOne(discount::class);
    }

    public function productDiscount(Request $request)
    {
        if (!$this->discount()->exists())
        {
            $this->discount()->create([
                'percent' => $request->get('percent')
            ]);
        }
        else
        {
            $this->UpdateProductDiscount($request);
        }
    }

    public function UpdateProductDiscount(Request $request)
    {
        $this->discount()->update([
            'percent' => $request->get('percent')
        ]);
    }

    public function DeleteProductDiscount()
    {
        $this->discount()->delete();
    }




    public function getHasDiscountAttribute() :bool
    {

            return $this->discount()->exists();

    }

    public function getDiscountPercentAttribute()
    {
        if ($this->has_discount)
        {
           return $this->discount->percent;
        }
    }

    public function getCostWithDiscountAttribute()
    {
        if (!$this->has_discount)
        {
            return $this->cost;
        }
        else
        {
            return $this->cost - ($this->cost * $this->discount_percent/100);
        }
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)
            ->withPivot(['value'])
            ->withTimestamps();
    }

    public function GetProductPropertiesValue(Property $property)
    {
        $ProductProperties = $this->properties()->where('property_id' , $property->id);


        if (!$ProductProperties->exists())
        {
            return null;
        }
        return $ProductProperties->first()->pivot->value;
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class , 'likes')
            ->withTimestamps();

    }

    public function getImagePathAttribute()
    {
        return str_replace('public','/storage',$this->image);
    }

    public function getBrandNameAttribute()
    {
        return $this->brand->name;
    }
}
