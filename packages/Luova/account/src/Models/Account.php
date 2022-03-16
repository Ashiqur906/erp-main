<?php

namespace Luova\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;
    protected $table = 'accounts';
    protected $fillable = [
        'user_id', 'ac_head', 'title', 'code', 'description','opening_balance',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function ledgers()
    {
        return $this->hasMany(AccountLedger::class,'account_id','id');
    }

    public function head()
    {
        return $this->belongsTo(AccountHead::class, 'ac_head');
    }

  



}
