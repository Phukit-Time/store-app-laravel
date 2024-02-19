<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleLineItem extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $table = 'saleLineItem';

    protected $fillable = [
        'itemId',
        'name',
        'price',
        'quantity'
    ];
}
