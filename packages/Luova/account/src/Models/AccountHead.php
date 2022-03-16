<?php

namespace Luova\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountHead extends Model
{
    use SoftDeletes;
    protected $table = 'account_heads';
    protected $fillable = [
        'title', 'type',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
    public function accounts()
    {
        return $this->hasMany(Account::class,'ac_head','id');
    }

    public function ledgers()
    {

        return $this->hasManyThrough(AccountLedger::class, Account::class,'ac_head','account_id');
        
    }
}
