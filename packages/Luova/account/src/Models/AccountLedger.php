<?php

namespace Luova\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountLedger extends Model
{
    use SoftDeletes;
    protected $table = 'account_ledgers';
    protected $fillable = [
        'account_id', 'journal_id', 'debit', 'credit',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}  