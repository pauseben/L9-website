<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable = ['name', 'email', 'phone', 'leves', 'a_menu', 'b_menu', 'datum','user_id'];
    //Tell laravel to fetch text values and set them as arrays
    protected $casts = [
        'leves' => 'array',
        'a_menu' => 'array',
        'b_menu' => 'array',
        'datum' => 'array'
        ];
}
