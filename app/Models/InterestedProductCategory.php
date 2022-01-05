<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedProductCategory extends Model
{
    use HasFactory;

    protected $table = 'interested_product_categories';

    protected $fillable = ['user_id', 'product_category_id'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'product_category_id', 'id');
    }
}