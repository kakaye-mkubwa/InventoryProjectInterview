<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchases extends Model
{
    use HasFactory;
    protected $table = 'product_purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'productID',
        'receivedBy',
        'quantity',
        'cost',
    ];
}
