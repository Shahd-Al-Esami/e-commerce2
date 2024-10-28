<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'total',
        'status','product_id','user_id','paymentMethod'
    ];
    public function user(): BelongsTo{
        return  $this->belongsTo(User::class);
     }
     public function product():BelongsTo {
        return  $this->belongsTo(Product::class)->withTrashed();
     }
}
