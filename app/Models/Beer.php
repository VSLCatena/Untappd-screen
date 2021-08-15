<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Beer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Beer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beer query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $label_image
 * @property string $style
 * @property float $abv
 * @property float $ibu
 * @property string $date_created
 * @property int $rating_count
 * @property float $rating_score
 * @property int $brewery_id
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereAbv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereBreweryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereDateCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereIbu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereLabelImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereRatingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereRatingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beer whereStyle($value)
 */
class Beer extends Model
{
    use HasFactory;

    protected $table = 'beers';

    function map() {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->label_image,
            'style' => $this->style,
            'abv' => $this->abv,
            'ibu' => $this->ibu,
            'created_at' => $this->date_created,
            'rating' => [
                'count' => $this->rating_count,
                'score' => $this->rating_score
            ],
        ];
    }

    function brewery(): BelongsTo {
        return $this->belongsTo(Brewery::class);
    }
}
