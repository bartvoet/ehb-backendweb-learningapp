<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FAQItem;

class FAQCategory extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(FAQItem::class);
    }
}
