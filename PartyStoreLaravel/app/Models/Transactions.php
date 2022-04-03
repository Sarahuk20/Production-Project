<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table='Transactions'; 
    public $timestamps = true;

    protected $casts = [
        'Party_Order_ID' => 'integer',     
        'Payment_ID' => 'integer',
        'Payment_Amount'=>'float'
    ];

    protected $fillable=[
        'Party_Order_ID', 
        'Payment_ID',
        'Payment_Amount',
        'Payment_Status',
        'Payer_Email',
        'First_Name',
        'Last_Name',
        'Address_Street',
        'Address_City',
        'Address_State',
        'Address_Zip',
        'Address_Country',
    ];
}
