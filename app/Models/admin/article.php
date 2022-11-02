<?php

namespace App\Models\admin;

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\admin\article
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $category_id
 * @property string $title
 * @property string $slug
 * @property string|null $thumb
 * @property string $description
 * @property string $content
 * @property int $status PUBLISHED/DRAFT
 * @property int|null $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $source
 * @property-read \App\Models\admin\category|null $category
 * @property-read \App\Models\admin\tag|null $tag
 * @method static \Illuminate\Database\Eloquent\Builder|article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|article query()
 * @method static \Illuminate\Database\Eloquent\Builder|article whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable =[
        'title',
        'slug',
        'thumb',
        'author_id',
        'category_id',
        'description',
        'content',
        'status',
        'tag_id',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(category::class,'category_id',)->withDefault(['name'=>'']);
    }

    public function tag():BelongsTo
    {
        return $this->belongsTo(tag::class,'tag_id')->withDefault(['name'=>'']);
    }
}
