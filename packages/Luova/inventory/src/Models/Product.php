<?php

namespace Luova\Inventory\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Luova\Purchase\Models\PurchaseDetail;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'title', 'code', 'unit_id', 'category_id', 'description', 'purchase_price',
        'sales_price', 'dp_price', 'tp_price', 'avg_purchase', 'avg_sale','current_stock',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function stokIn()
    {
        return $this->hasMany(PurchaseDetail::class);
    }



 


}
