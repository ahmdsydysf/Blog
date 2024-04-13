<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Post extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['title', 'content', 'small_description' , 'tags'];
    protected $fillable = ['image'];
}
