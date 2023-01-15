<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQItem;

class Tag extends Model
{
    use HasFactory;

    public function faqitems()
    {
        return $this->belongsToMany(FAQItem::class, 'faq_tag', 'f_a_q_item_id','tag_id');
    }
}
