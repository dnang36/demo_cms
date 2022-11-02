<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\admin\roles
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|roles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|roles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|roles query()
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|roles whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class roles extends Model
{
    use HasFactory;

    protected $table ='roles';
}
