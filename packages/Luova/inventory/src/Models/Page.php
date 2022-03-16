<?php

namespace Luova\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $table = 'pages';
    protected $fillable = [
        'title', 'sub_title', 'slug', 'description', 'seo_id',
        'remarks', 'sort_by', 'is_active', 'create_by', 'modified_by'
    ];

    public function seo()
    {
        return $this->belongsTo('Luova\Seo\Models\Seo', 'seo_id');
    }
}
