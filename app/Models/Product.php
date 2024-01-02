<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public $table = "products";
    protected $guarded = [];

    public function categories():BelongsTo{
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function subcategories():BelongsTo{
        return $this->belongsTo(SubCategory::class, 'cat_id', 'id');
    }

}
