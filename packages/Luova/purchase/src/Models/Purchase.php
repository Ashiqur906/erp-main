<?php

namespace Luova\Purchase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luova\Account\Models\Account;
use Luova\Account\Models\AccountJournal;

class Purchase extends Model
{
    use SoftDeletes;
    protected $table = 'purchases';
    protected $fillable = [
        'supplier_invoice', 'invoice_date', 'party_ac', 'purchase_ledger', 'date',
        'total', 'discount', 'vat', 'round_of', 'grand_total',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function party()
    {
        return $this->belongsTo(Account::class, 'party_ac');
    }
    public function ledger()
    {
        return $this->belongsTo(Account::class, 'purchase_ledger');
    }

    public function journal()
    {
        return $this->hasOne(AccountJournal::class, 'voucher_id','id')
        ->where('voucher_type','Luova\Purchase\Models\Purchase');
  
    }

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

}
