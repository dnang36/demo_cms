<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable =[
        'parent_id',
      'name',
      'slug',
      'description',
      'content',
    ];

    protected function getname():Attribute
    {
        return Attribute::make(
            get: function ($value,$attribute){
                if ($attribute['parent_id'] ===0){
                    return '-';
                }
                elseif ($attribute['parent_id'] === $attribute['id']){
                    return $attribute['name'];
                }
            },
        );
    }
}
