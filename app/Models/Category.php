<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;

    protected $with = ['children'];

    public function scopeParents(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
