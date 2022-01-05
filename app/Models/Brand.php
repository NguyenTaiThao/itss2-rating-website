<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Brand extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "brands";

    protected $guard = 'brand';

    protected $fillable = ['name', 'email', 'password', 'logo_path', 'company_category_id'];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(CompanyType::class, 'company_category_id', 'id');
    }

    public function posts()
    {
        return $this->HasMany(Post::class, 'user_id', 'id');
    }

    public function activeReviews()
    {
        return $this->hasManyThrough(Review::class, Post::class, 'user_id', 'post_id', 'id', 'id')->where('is_spam', false);
    }

    public function spamReviews()
    {
        return $this->hasManyThrough(Review::class, Post::class, 'user_id', 'post_id', 'id', 'id')->where('is_spam', true);
    }

    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, InterestedBrand::class, 'brand_id', 'user_id');
    }
}