<?php

namespace Luova\Sale\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luova\Inventory\Models\Product;

class SaleDetail extends Model
{
    use SoftDeletes;
    protected $table = 'sale_details';
    protected $fillable = [
        'sale_id', 'product_id', 'qty', 'rate', 'total','price_type',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
