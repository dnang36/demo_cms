<?php

namespace App\Models\admin;

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'status',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(category::class,'category_id');
    }
}
