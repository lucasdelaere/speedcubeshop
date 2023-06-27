<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "brand_id", "name", "description", "type_id", "photo_id", "rating", "price", "size", "weight", "slug"
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
    public function scopeSearchProducts($query, $searchTerm = null)
    {
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhereRelation('brand', 'name', 'like', '%' . $searchTerm . '%')
                ->orWhereRelation('type', 'name', 'like', '%' . $searchTerm . '%');
        }
        // return all products when search field is empty
        return $query;
    }
}
