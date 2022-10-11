<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'slug',
        'thumb',
        'author_id',
        'category_id',
        'description',
        'content',
        'status'
    ];
}
