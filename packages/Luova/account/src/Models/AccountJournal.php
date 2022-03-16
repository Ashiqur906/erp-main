<?php

namespace Luova\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountJournal extends Model
{
    use SoftDeletes;
    protected $table = 'account_journals';
    protected $fillable = [
        'voucher_type', 'voucher_id', 'title', 'narration', 'discription', 'amount','invoice_date',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function ledgers()
    {
        return $this->hasMany(AccountLedger::class,'journal_id','id');
    }
}

