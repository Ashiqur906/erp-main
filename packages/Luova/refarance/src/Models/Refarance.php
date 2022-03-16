<?php

namespace Luova\Refarance\Models;

use Illuminate\Database\Eloquent\Model;

class Refarance extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'user_id', 'name',  'mobile', 'description',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
}
