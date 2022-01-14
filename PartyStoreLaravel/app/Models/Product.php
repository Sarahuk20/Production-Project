<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    public $timestamps = true;

    protected $casts = [
        'Price' => 'float',       
        'Stock' => 'integer',
        'ProductTypeID'=>'integer'
    ];

    protected $fillable = [
        'ProductTypeID',
        'ProductName',
        'Firstname',
        'Surname',
        'Description',
        'Price',
        'Stock',
        'file_name'
    ];
}
