<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $brewery_id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBreweryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereValue($value)
 */
class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'contacts';

    function map() {
        return [
            'key' => $this->key,
            'value' => $this->value
        ];
    }
}
