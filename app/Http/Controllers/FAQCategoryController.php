<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FAQCategory::all();
        return view('faqcategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = new FAQCategory;
        $faq->name = $request->input("name");
        $faq->description = $request->input('description');
        $faq->save();
        return redirect()->route('faqcategories.index')->with('status', 'Categorie added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = FAQCategory::findOrFail($id);
        return view('faqcategories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = FAQCategory::findOrFail($id);
        return view('faqcategories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = FAQCategory::findOrFail($id);
        $faq->name = $request->input("name");
        $faq->description = $request->input('description');
        $faq->save();
        return redirect()->route('faqcategories.index')->with('status', 'Categorie updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsItem = FAQCategory::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('faqcategories.index')->with('status', 'Categorie deleted');
    }
}
