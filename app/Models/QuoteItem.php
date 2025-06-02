<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Quote;

class QuoteItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Belongs to a quote
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    // Belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Computed total for the line item (quantity * unit price)
    public function getTotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }
}