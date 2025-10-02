<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
        'user_id',
        'sum',
        'reason_id'
    ];

    public function reason()
    {
        return $this->hasOne(LoanReasons::class, 'id', 'reason_id');
    }
}
