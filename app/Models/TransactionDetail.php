<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_id',
        'item_id',
        'service_id',
        'quantity',
        'status',
        'description',
    ];

    public function header() {
        return $this->belongsTo(TransactionHeader::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function service() { 
        return $this->belongsTo(Service::class);
    }
}
