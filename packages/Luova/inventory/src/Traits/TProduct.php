<?php

namespace Luova\Inventory\Traits;

use Illuminate\Http\Request;
use Luova\Inventory\Models\Product;
use Luova\Purchase\Models\PurchaseDetail;
use Luova\Sale\Models\SaleDetail;

trait TProduct
{
    public function UpdatePP($request)
    {

        foreach($request->item as $key => $item){
            $sale = SaleDetail::where('product_id', $item['product'])->get();
            $purchase = PurchaseDetail::where('product_id', $item['product'])->get();

            $sale_qty = $sale->sum('qty');
            $sale_total = $sale->sum('total');
            $sale_avg = ($sale_qty > 0)?($sale_total / $sale_qty):null;
            $purchase_qty = $purchase->sum('qty');
            $purchase_total = $purchase->sum('total');
            $purchase_avg = ($purchase_qty > 0)?($purchase_total / $purchase_qty):null;
            Product::where('id', $item['product'])->update([
                'avg_purchase' => round($purchase_avg,2),
                'avg_sale' => round($sale_avg,2),
                'current_stock' => ($purchase_qty - $sale_qty),
            ]);
          
        }
    }
   
}
