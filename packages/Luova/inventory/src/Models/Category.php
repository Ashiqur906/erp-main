<?php

namespace Luova\Inventory\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
}
