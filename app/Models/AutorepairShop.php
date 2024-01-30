<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorepairShop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_number',
        'details',
        'logo',
        'image',
    ];

    public function testimonials() {
        return $this->hasMany(Testimonial::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }
}
