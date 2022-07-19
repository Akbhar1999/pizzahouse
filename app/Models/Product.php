<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = []; 
    protected $casts = [
        'categories' => 'array'
    ]; 

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
   
   
 
}
