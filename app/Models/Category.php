<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
class Category extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
