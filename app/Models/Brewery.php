<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brewery
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $label_image
 * @property int $beer_count
 * @property string $location_country
 * @property string $location_address
 * @property string $location_city
 * @property string $location_state
 * @property float $location_latitude
 * @property float $location_longitude
 * @property int $rating_count
 * @property float $rating_score
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereBeerCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLabelImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereLocationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereRatingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereRatingScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brewery whereType($value)
 */
class Brewery extends Model
{
    use HasFactory;

    protected $table = 'breweries';

    function map() {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'brewery_type' => $this->type,
            'image' => $this->label_image,
            'beers_count' => $this->beer_count,
            'location' => [
                'country' => $this->location_country,
                'state' => $this->location_state,
                'address' => $this->location_address,
                'city' => $this->location_city,
                'latitude' => $this->location_latitude,
                'longitude' => $this->location_longitude
            ],
            'rating' => [
                'count' => $this->rating_count,
                'score' => $this->rating_score
            ]
        ];
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }
}
