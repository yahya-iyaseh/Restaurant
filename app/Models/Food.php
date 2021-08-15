<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Food extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = ['name', 'description', 'price', 'category_id'];
    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id' );
    }
}
