<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;

    /**
     * Возвращает список товаров выбранной категории
     */

    protected $fillable = [ 'parent_id', 'name' , 'content', 'slug', 'image', 'created_at', 'updated_at'];



    public function getProducts()
    {
        return Product::where('category_id', $this->id)->get();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {

        return $this->hasMany(Category::class, 'parent_id');

    }
    public static function roots() {
        return self::with('children')->get();
    }
}
