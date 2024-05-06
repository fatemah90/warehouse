<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionType;
use App\Models\Item;
use App\Models\Warehouse;
class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['transaction_type_id','item_id','warehouse_id','quantity','price','transaction_date','transction_code'];
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

