<?php

namespace Luova\Direction\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = [
        'division', 'district', 'thana', 'union', 'postoffice', 'village', 'para', 'ward', 'postcode'
    ];
}
