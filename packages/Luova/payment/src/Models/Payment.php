<?php

namespace Luova\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luova\Account\Models\AccountJournal;
use Luova\Account\Models\Account;

class Payment extends Model
{
    use SoftDeletes;
    protected $table = 'payments';
    protected $fillable = [
        'invoice_date', 'narration', 'total_debit', 'total_credit',
        'total', 'discount', 'vat', 'round_of', 'grand_total',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function ledger()
    {
        return $this->belongsTo(Account::class, 'sale_ledger');
    }
    public function journal()
    {
        return $this->hasOne(AccountJournal::class, 'voucher_id','id')
        ->where('voucher_type','Luova\Payment\Models\Payment');
  
    }
    public function details()
    {
        return $this->hasMany(PaymentDetail::class);
    }

}
