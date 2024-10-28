<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'amount',
        'price','path','category_ids'
    ];
    public function categories(): BelongsToMany{
        return  $this->belongsToMany(Category::class,'category_products','product_id','category_id');
     }
     public function order(): HasMany{
        return  $this->hasMany(Order::class);
     }
}
