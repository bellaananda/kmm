<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_date',
        'entry_date',
        'exit_date',
        'estimated_date',
        'owner_name',
        'owner_phone',
        'owner_address',
        'plate_number',
        'vehicle_type',
        'description',
        'status',
        'additional_fee',
        'total_price',
        'down_payment',
        'down_payment_date',
        'final_payment',
        'final_payment_date',
        'proof_of_payment',
        'payment_method',
        'is_fully_paid',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }
}
