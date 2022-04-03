<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    use HasFactory;

    protected $table='Order_Items'; 
    public $timestamps = true;

    protected $casts = [
        'Quantity' => 'integer',     
        'Party_Order_ID' => 'integer',
        'Product_ID'=>'integer'
    ];

    protected $fillable=[
        'Party_Order_ID', 
        'Product_ID',
        'Quantity',
    ];
}
