<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQCategory;
use App\Models\Tag;

class FAQItem extends Model
{
    use HasFactory;

    public function category()
    {
        //return $this->belongsTo(FAQCategory::class);
        return $this->belongsTo('App\Models\FAQCategory','f_a_q_category_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'faq_tag', 'f_a_q_item_id', 'tag_id');
    }
}
