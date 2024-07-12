<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'price', 'category_id'];

    protected $table = 'products';
    public function getSingleWithId($id)
    {
        // return self::find($id);
        return self::where('id', $id)->first();
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'category_id', 'id');
    }
}
