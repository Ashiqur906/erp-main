<?php

namespace Luova\Document\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        'title', 'user_id', 'type', 'description', 'file_one', 'file_two', 'file_three',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];
}
