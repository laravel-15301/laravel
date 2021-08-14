<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // chỉ định table trong trường hợp không đặt theo quy tắc của Eloquent
    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
    ];
    // Mặc định, Eloquent coi primary key là cột id
    protected $primaryKey = 'id';
}
