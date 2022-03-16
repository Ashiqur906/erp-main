<?php

namespace Luova\Makeup\Models;

use Illuminate\Database\Eloquent\Model;

class Makeup extends Model
{
    protected $table = 'makeups';
    protected $fillable = [
        'key', 'display_name',
        'value', 'details', 'type', 'order', 'group',
    ];
}
