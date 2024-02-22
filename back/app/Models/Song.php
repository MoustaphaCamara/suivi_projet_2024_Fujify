<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * - Attributes.
 *
 * @property int $id
 * @property string $title
 * @property string $duration
 * @property string $description
 */
class Song extends Model
{
    use HasFactory;

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }
}
