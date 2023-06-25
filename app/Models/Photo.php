<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ["file"];
    protected $uploads = "/assets/";

    //accessor = getAttribute
    //getFileAttribute
    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
        // /assets/1645648153batman.png
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
