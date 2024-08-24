<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatUredCategory extends Model
{
    use HasFactory;


    public $incrementing = false;

    protected $primaryKey = 'category_id';

    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public static function getCategory()
    {
        return optional(self::query()->first())->category;
    }
}
