<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restock_id',
        'header_id',
        'initial_amount',
        'final_amount',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function restock() {
        return $this->belongsTo(Restock::class);
    }

    public function header() {
        return $this->belongsTo(TransactionHeader::class);
    }
}
