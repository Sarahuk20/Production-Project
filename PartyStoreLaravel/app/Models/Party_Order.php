<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party_Order extends Model
{
    use HasFactory;

    protected $table='Party_Order'; 
    public $timestamps = true;

    protected $casts = [
        'Pay' => 'float',   
        'Total' => 'float',     
        'Order_Status_ID' => 'integer',
        'User_ID'=>'integer'
    ];

    protected $fillable=[
        'Order_Status_ID', 
        'User_ID',
        'Pay',
        'Total',
    ];
}
