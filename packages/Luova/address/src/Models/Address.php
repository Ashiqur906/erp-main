<?php

namespace Luova\Address\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'user_id', 'type', 'division', 'district', 'thana', 'union', 'postoffice',
        'village', 'para', 'ward', 'postcode', 'house_no', 'aprtment_no',

        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
}
