<?php

namespace Luova\Option\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;
    protected $table = 'options';
    protected $fillable = [
        'name', 'type', 'description',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
}
