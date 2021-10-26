<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=["product_name","product_brand"];

    public function slugs() {
        return $this->belongsToMany(Slug::class, 'product_slugs');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
