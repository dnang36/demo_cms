<?php

namespace App\Models\admin;

use App\Http\Controllers\admin\ArticleController;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\admin\category
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\admin\article[] $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category query()
 * @method static \Illuminate\Database\Eloquent\Builder|category whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable =[
        'parent_id',
      'name',
      'slug',
      'description',
      'content',
    ];

//    protected function getname():Attribute
//    {
//        return Attribute::make(
//            get: function ($value,$attribute){
//                if ($attribute['parent_id'] ===0){
//                    return '-';
//                }
//                elseif ($attribute['parent_id'] === $attribute['id']){
//                    return $attribute['name'];
//                }
//            },
//        );
//    }

    public function articles()
    {
        return $this->hasMany(article::class,'category_id');
    }
}
