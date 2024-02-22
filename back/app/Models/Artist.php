<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * - Attributes.
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $birth_date
 * @property string $label
 */
class Artist extends Model
{
    use HasFactory;

    protected $fillable=['name','alias','birth_date','label'];

    public function songs() {
        return $this->belongsToMany(Song::class);
    }
}
