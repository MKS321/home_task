<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->hasOne(Category::class , 'id' , 'cat_id');
    
}
}
