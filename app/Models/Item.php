<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'purchase_price',
        'selling_price',
        'stock',
        'description',
    ];

    public function shop() {
        return $this->belongsTo(AutorepairShop::class);
    }

    public function restocks() {
        return $this->hasMany(Restock::class);
    }
}
