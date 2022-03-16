<?php

namespace Luova\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luova\Account\Models\Account;

class PaymentDetail extends Model
{
    use SoftDeletes;
    protected $table = 'payment_details';
    protected $fillable = [
        'payment_id', 'account_id', 'debit', 'credit', 
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

}
