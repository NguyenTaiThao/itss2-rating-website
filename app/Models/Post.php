<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'content', 'img_url', 'product_category_id'];

    protected $appends = ['rating_point', 'rating_time'];

    public function getRatingPointAttribute()
    {
        $reviews = $this->reviews()->where('is_spam', false)->get();
        $count = $reviews->count();
        if ($count == 0) {
            return 0;
        }
        $point = $reviews->sum('rating') / $count;
        return $point;
    }

    public function getRatingTimeAttribute()
    {
        $reviews = Review::where("post_id", $this->id)->get();
        $count = $reviews->count();

        return $count;
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function reviews()
    {
        $isAuth = Auth::check();
        if ($isAuth) {
            $userId = Auth::user()->id;
            return $this->hasMany(Review::class, 'post_id', 'id')->where('is_spam', false)->orWhere(function ($query) use ($userId) {
                $query->where(['is_spam' => true, 'user_id' => $userId]);
            });
        }
        return $this->hasMany(Review::class, 'post_id', 'id')->where('is_spam', false);
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'user_id');
    }
}
