<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSlug extends Model
{
    use HasFactory;
    protected $table="product_slugs";
    protected $fillable=["product_id","slug_id"];
}
