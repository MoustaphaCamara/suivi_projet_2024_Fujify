<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * - Attributes.
 *
 * @property int $id
 * @property string $title
 * @property string $category
 * @property string $description
 * @property string $cover_image
 */
class Anime extends Model
{
    use HasFactory;
    protected $fillable = ['title','category','description','cover_image'];
}
