<?php

namespace Luova\Account\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Luova\Account\Models\AccountHead;


class AccountHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountHead::create([
            'title' => 'Purchase Accounts',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 1

        ]);
        AccountHead::create([
            'title' => 'Sales Account',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 2

        ]);
        AccountHead::create([
            'title' => 'Duties and Taxes',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 3

        ]);
        AccountHead::create([
            'title' => 'Direct Expenses',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 4

        ]);
        AccountHead::create([
            'title' => 'Indirect Expenses',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 5

        ]);
        AccountHead::create([
            'title' => 'Indirect Income',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 6

        ]);
        AccountHead::create([
            'title' => 'Bank Account',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 7

        ]);
        AccountHead::create([
            'title' => 'Deposit Account',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 8

        ]);
        AccountHead::create([
            'title' => 'Capital Account',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 9

        ]);
        AccountHead::create([
            'title' => 'Current Assets',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 10

        ]);
        AccountHead::create([
            'title' => 'Current Liabilities',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 11

        ]);
        AccountHead::create([
            'title' => 'Sundry Creditor',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 12

        ]);
        AccountHead::create([
            'title' => ' Loans & Advances (Assets)',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 13

        ]);
        AccountHead::create([
            'title' => 'Loans Liabilities',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 14

        ]);
        AccountHead::create([
            'title' => 'Fixed Assets',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 15

        ]);
        AccountHead::create([
            'title' => 'Bank OCC',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 16

        ]);
        AccountHead::create([
            'title' => 'Bank OD',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 17

        ]);
        AccountHead::create([
            'title' => 'Branch/Divisions',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 18

        ]);
        AccountHead::create([
            'title' => 'Cash in Hand',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 19

        ]);
        AccountHead::create([
            'title' => 'Investments',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 20

        ]);
        AccountHead::create([
            'title' => 'Stock in Hand',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 21

        ]);
        AccountHead::create([
            'title' => 'Misc. Expense (ASSET)',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 22

        ]);
        AccountHead::create([
            'title' => 'Suspense Account',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 23

        ]);
        AccountHead::create([
            'title' => 'Secured Loan',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 24

        ]);
        AccountHead::create([
            'title' => 'Unsecured Loan',
            'type' => 'Liability', //Asset','Liability'
            'sort_by' => 25

        ]);
        AccountHead::create([
            'title' => ' Reserve & Surplus',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 26

        ]);
        AccountHead::create([
            'title' => 'Provisions',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 27

        ]);
        AccountHead::create([
            'title' => 'Sundry Debtors',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 28

        ]);
        AccountHead::create([
            'title' => 'Retained Earring',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 29

        ]);
        AccountHead::create([
            'title' => 'Direct Incomes',
            'type' => 'Asset', //Asset','Liability'
            'sort_by' => 30

        ]);
    }
}
// php artisan db:seed --class="Luova\Account\Database\Seeds\AccountHeadSeeder"