<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\admin\permisson
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|permisson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|permisson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|permisson query()
 * @method static \Illuminate\Database\Eloquent\Builder|permisson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|permisson whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|permisson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|permisson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|permisson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class permisson extends Model
{
    use HasFactory;

    protected $table = 'permissions';
}
