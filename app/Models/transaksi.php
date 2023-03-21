<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'qty',
        'total_price'
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
