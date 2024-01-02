<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    public $table = "subcategories";
    protected $guarded = [];

    public function categories(): BelongsTo{
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function products(): HasMany{
        return $this->HasMany(Product::class, 'cat_id', 'id');
    }
}
