<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'product';
    public $timestamps = true;

    protected $casts = [
        'Price' => 'float',       
        'Stock' => 'integer',
        'Party_Sub_Type_ID'=>'integer'
    ];

    protected $fillable = [
        'Party_Sub_Type_ID',
        'Name',
        'Firstname',
        'Surname',
        'Description',
        'Price',
        'Stock',
        'file_name'
    ];

	public $sortable = ['Party_Sub_Type_ID','Name',
    'Firstname',
    'Surname',
    'Description',
    'Price',
    'Stock',
    'file_name'];


}
