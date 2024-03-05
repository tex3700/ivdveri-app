<?php

namespace App\Models\Products\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'name',
        'display_name',
    ];
}
