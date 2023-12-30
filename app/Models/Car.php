<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function get_cat_name(){
        if($this->category()->exists()){
            // check if the car has a related category
            return $this->category->cat_name;
        }
    }
    
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'published',
        'image',
        ];
}
