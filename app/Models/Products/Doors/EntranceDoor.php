<?php

namespace App\Models\Products\Doors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceDoor extends Model
{
    use HasFactory;

    protected $fillable = [
        'SKU',
        'UPC',
        'size',
        'side_opening',
        'inside_color',
        'outside_color',
        'executive_type',
        'prod_storage',
        'quantity_storage',
        'on_site',
        'side_op_img',
        'inside_col_img',
        'outside_col_img',
        'ex_type_img',
        'tags',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'SKU';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected static function booted(): void
    {
        static::saving(function ($model) {
            if ($model->quantity_storage != 0 && is_null($model->prod_storage)) {
                throw new \Exception('Необходимо выбрать склад хранения при установленном значении количество товара в наличии отличном от 0');
            }
        });
    }
}
