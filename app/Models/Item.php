<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\model\Category;
class Item extends Model
{
    use HasFactory;
    protected $fillable=['name','commercial_name','price','category_id','item_code'];
        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class);
        }
}
