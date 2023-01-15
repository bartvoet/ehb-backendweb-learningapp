<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQCategory;

class FAQItem extends Model
{
    use HasFactory;

    public function category()
    {
        //return $this->belongsTo(FAQCategory::class);
        return $this->belongsTo('App\Models\FAQCategory','f_a_q_category_id','id');
    }
}
