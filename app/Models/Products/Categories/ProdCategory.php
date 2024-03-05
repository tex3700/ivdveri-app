<?php

namespace App\Models\Products\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
    ];
}
