<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Product extends Model
{
    protected $fillable = ['name', 'code', 'product_category_id', 'description'];
    
public function categories() {
    return $this->belongsTo(ProductCategory::class, 'product_category_id');
}
public function Variants(){
    return $this->belongsTo(ProductVariant::class, 'product_id' );
}

}

