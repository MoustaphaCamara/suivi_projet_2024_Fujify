<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * - Attributes.
 *
 * @property int $id
 * @property string $image
 */
class AlbumCover extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
}
