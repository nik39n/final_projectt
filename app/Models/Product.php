<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model {
    use SoftDeletes;

    use HasFactory;

    /**
     * Возвращает категорию выбранного товара
     */
    public function getCategory() {
        return Category::find($this->category_id);
    }

    protected $fillable = ['id','category_id', 'brand_id','name', 'content', 'slug', 'image', 'price', 'hit', 'new', 'recommend','created_at','updated_at','count'];
    /**
     * Возвращает бренд выбранного товара
     */
    public function getBrand() {
        return Brand::find($this->brand_id);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function baskets(){
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
    public function getPriceForCount(){
        if (!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function isAvailable(){
        return !$this->trashed() && $this->count>0;
    }

    public function setNewAttribute($value){
        $this->attributes['new'] = $value === 'on' ? 1:0;
    }
    public function setHitAttribute($value){
        $this->attributes['hit'] = $value === 'on' ? 1:0;
    }
    public function setRecommendAttribute($value){
        $this->attributes['recommend'] = $value === 'on' ? 1:0;
    }
    public function isHit(){
        return $this->hit === 1;

    }
    public function isNew(){
        return $this->new === 1;

    }
    public function isRecommend(){
        return $this->recommend === 1;
    }
}