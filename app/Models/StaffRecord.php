<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'detail_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'description',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function detail() {
        return $this->belongsTo(TransactionDetail::class);
    }
}
