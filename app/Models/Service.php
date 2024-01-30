<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'price',
        'description',
    ];

    public function shop() {
        return $this->belongsTo(AutorepairShop::class);
    }
}
