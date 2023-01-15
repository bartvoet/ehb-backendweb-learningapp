<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\FAQItem;

class TagLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function linkTag(Request $request, $id)
    {
        $item = FAQItem::find($id);
        $tag = Tag::find($request->input("tag_id"));
        $item->tags()->save($tag);
        return redirect()->back();
    }
}
