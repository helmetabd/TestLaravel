<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filter){
        if($filter['search'] ?? false){
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }
        if($filter['published'] ?? false){
            $query->where('is_publish', 'like', '%' . request('published') . '%');
        } else{
            $query->where('is_publish', 'like', '%' . request('published') . '%');
        }
    }
}
