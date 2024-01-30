<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'vehicle_type',
        'description',
        'image',
        'is_shown_anonymously',
        'is_shown',
    ];

    public function shop() {
        return $this->belongsTo(AutorepairShop::class);
    }
}
