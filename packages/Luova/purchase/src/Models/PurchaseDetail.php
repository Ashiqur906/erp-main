<?php

namespace Luova\Purchase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luova\Inventory\Models\Product;

class PurchaseDetail extends Model
{
    use SoftDeletes;
    protected $table = 'purchase_details';
    protected $fillable = [
        'purchase_id', 'product_id', 'qty', 'rate', 'total',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
