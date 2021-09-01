<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function parent()
    {
        return $this->belongsTo(self::class, 'id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
    return $this->children()->with('childrenRecursive');
    }
}
