<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
class Warehouse extends Model
{
    use HasFactory;
    protected $fillable=['name','location'];
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
