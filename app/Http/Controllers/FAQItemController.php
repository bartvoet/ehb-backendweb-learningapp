<?php

namespace App\Http\Controllers;

use App\Models\FAQItem;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FAQCategory::all();
        return view('faq.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FAQCategory::all()->pluck('name', 'id');
        return view('faq.create',["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new FAQItem;
        $faq->question = $request->input("question");
        $faq->answer = $request->input('answer');

        $category = FAQCategory::find($request->input("categoryid"));
        $category->items()->save($faq);

        return redirect()->route('faq.index')->with('status', 'FAQ added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQItem  $fAQItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = FAQItem::findOrFail($id);
        return view('faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQItem  $fAQItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQItem::findOrFail($id);
        return view('faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQItem  $fAQItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = FAQItem::findOrFail($id);
        $faq->question = $request->input("question");
        $faq->answer = $request->input('answer');
        $faq->save();
        return redirect()->route('faq.index')->with('status', 'FAQ updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQItem  $fAQItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $faq = FAQItem::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqcategories.index')->with('status', 'Categorie deleted');
    }
}
