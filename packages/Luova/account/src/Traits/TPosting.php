<?php

namespace Luova\Account\Traits;

use Illuminate\Http\Request;
use Luova\Account\Models\AccountJournal;
use Luova\Account\Models\AccountLedger;
use Luova\Inventory\Models\Product;

trait TPosting
{
    public function PuerchasePosting($request,$id)
    {

        $default = [
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'Yes',
            'modified_by' => auth()->user()->id,
            'create_by' => auth()->user()->id,
        ];

        $jurnal_pro = [
            'voucher_type' => 'Luova\Purchase\Models\Purchase',
            'voucher_id' => $id,
            'title' => ($request->narration)?$request->narration:'Purchase Voucher',
            'narration' =>($request->narration)?$request->narration:'Purchase Voucher',
            'discription' =>($request->narration)?$request->narration:'Purchase Voucher',
            'amount' => $request->grand_total,
        ];

        $jurnal_pro_arr = array_merge($jurnal_pro, $default);

        $jurnal = AccountJournal::create($jurnal_pro_arr);

        $this->ledgerPosting($request,[
            'account_id' => $request->party_ac, 
            'journal_id' => $jurnal->id, 
            'debit' =>0.00, 
            'credit' =>$request->grand_total,
        ]);
        $this->ledgerPosting($request,[
            'account_id' => $request->purchase_ledger, 
            'journal_id' => $jurnal->id, 
            'debit' =>$request->grand_total, 
            'credit' =>0.00,
        ]);


    }
    public function SalePosting($request,$id)
    {
        $purchage_price = 0;
       foreach($request->item as $item){
           $product = Product::find($item['product']);
           if($product){
            $purchage_price +=$product->avg_purchase * $item['qty'];
           }
       }
       $profit = round($request->total - $purchage_price,2);

       $netsale = $request->total- $profit;

        $default = [
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => $request->get('is_active') ? $request->get('is_active') : 'Yes',
            'modified_by' => auth()->user()->id,
            'create_by' => auth()->user()->id,
        ];

        $jurnal_pro = [
            'voucher_type' => 'Luova\Sale\Models\Sale',
            'voucher_id' => $id,
            'title' => ($request->narration)?$request->narration:'Sale Voucher',
            'narration' => ($request->narration)?$request->narration:'Sale Voucher',
            'discription' => ($request->narration)?$request->narration:'Sale Voucher',
            'amount' => $request->grand_total,
        ];

        $jurnal_pro_arr = array_merge($jurnal_pro, $default);

        $jurnal = AccountJournal::create($jurnal_pro_arr);

        // Party Posting 
        $this->ledgerPosting($request,[
            'account_id' => $request->party_ac, 
            'journal_id' => $jurnal->id, 
            'debit' =>$request->grand_total, 
            'credit' =>0.00,
        ]);
        // Sale Ledger
        $this->ledgerPosting($request,[
            'account_id' => $request->sale_ledger, 
            'journal_id' => $jurnal->id, 
            'debit' =>0.00, 
            'credit' => $netsale,
        ]);
        // Profit & Loss A/c -> 8 
        if($profit > 0){
            $this->ledgerPosting($request,[
                'account_id' => 8, 
                'journal_id' => $jurnal->id, 
                'debit' =>0.00, 
                'credit' =>$profit,
            ]);
        }
        // Discout 
        if($request->discount > 0){
            $this->ledgerPosting($request,[
                'account_id' => 9, 
                'journal_id' => $jurnal->id, 
                'debit' =>0.00, 
                'credit' =>$request->discount,
            ]);
        }
        // Vat and Tax 
        if($request->vat > 0){
            $this->ledgerPosting($request,[
                'account_id' => 11, 
                'journal_id' => $jurnal->id, 
                'debit' =>0.00, 
                'credit' =>$request->vat,
            ]);
        }
        // Rount OF
        if($request->vat <> 0){
            $this->ledgerPosting($request,[
                'account_id' => 10, 
                'journal_id' => $jurnal->id, 
                'debit' => ($request->vat > 0)? $request->vat : 0.00, 
                'credit' => ($request->vat < 0)? ($request->vat * -1) : 0.00,
            ]);
        }

  


    }
    public function ReceiptPosting($request,$id)
    {
       
        $default = [
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => 'Yes',
            'modified_by' => auth()->user()->id,
            'create_by' => auth()->user()->id,
        ];

        $jurnal_pro = [
            'voucher_type' => 'Luova\Receipt\Models\Receipt',
            'voucher_id' => $id,
            'title' => ($request->narration)?$request->narration:'Receipt Voucher',
            'narration' => ($request->narration)?$request->narration:'Receipt Voucher',
            'discription' => ($request->narration)?$request->narration:'Receipt Voucher',
            'amount' => $request->total_debit,
        ];


        $jurnal_pro_arr = array_merge($jurnal_pro, $default);

        $jurnal = AccountJournal::create($jurnal_pro_arr);

        foreach($request->item as $list){
               $this->ledgerPosting($request,[
                'account_id' =>$list['account'], 
                'journal_id' => $jurnal->id, 
                'debit' => $list['debit'], 
                'credit' => $list['credit'],
            ]);
           }

    }
    public function PaymentPosting($request,$id)
    {
       
        $default = [
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => 'Yes',
            'modified_by' => auth()->user()->id,
            'create_by' => auth()->user()->id,
        ];

        $jurnal_pro = [
            'voucher_type' => 'Luova\Payment\Models\Payment',
            'voucher_id' => $id,
            'title' => ($request->narration)?$request->narration:'Payment Voucher',
            'narration' => ($request->narration)?$request->narration:'Payment Voucher',
            'discription' => ($request->narration)?$request->narration:'Payment Voucher',
            'amount' => $request->total_debit,
        ];


        $jurnal_pro_arr = array_merge($jurnal_pro, $default);

        $jurnal = AccountJournal::create($jurnal_pro_arr);

        foreach($request->item as $list){
               $this->ledgerPosting($request,[
                'account_id' =>$list['account'], 
                'journal_id' => $jurnal->id, 
                'debit' => $list['debit'], 
                'credit' => $list['credit'],
            ]);
           }

    }
    


    public function ledgerPosting($request, $data)
    {

        $default = [
            'remarks' => $request->get('remarks'),
            'sort_by' => $request->get('sort_by'),
            'is_active' => 'Yes',
            'modified_by' => auth()->user()->id,
            'create_by' => auth()->user()->id,
        ];
   
        $ledger_pro_arr = array_merge($data, $default);
        //dd($ledger_pro_arr);
        AccountLedger::create($ledger_pro_arr);
    }
}
