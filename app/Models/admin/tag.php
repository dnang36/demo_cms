<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\admin\tag
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class tag extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
    ];

    public function articles()
    {
        return $this->hasMany(article::class,'tag_id');
    }
}
