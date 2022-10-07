<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [    

        'title',
        'slug',
        'content',
        'author',
        'status',
        'modifier',
        'menu_id',
        'parent_id'

    ];
}
