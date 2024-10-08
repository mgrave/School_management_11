<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function feecategory(){
        return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
