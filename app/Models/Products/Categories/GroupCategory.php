<?php

namespace App\Models\Products\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_id',
        'name',
        'display_name',
    ];
}
