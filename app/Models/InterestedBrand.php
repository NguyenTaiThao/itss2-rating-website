<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedBrand extends Model
{
    use HasFactory;

    protected $table = 'interested_brands';

    protected $fillable = ['user_id', 'brand_id'];
}