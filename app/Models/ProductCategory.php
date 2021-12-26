<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $hidden = ['created_at', 'updated_at'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'product_category_id', 'id');
    }

    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, InterestedProductCategory::class, 'product_category_id', 'user_id');
    }
}