<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsitems = NewsItem::orderBy('publishing_date', 'desc')->get();
        return view('newsitems.index', compact('newsitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|min:3',
            'content'     => 'required|min:5',
          ]);

        $post = new NewsItem;
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->publishing_date = now();
        $post->save();

        // $imageName = $post->id .'.'. $request->file->getClientOriginalExtension();
        // $request->file->move(public_path('/uploads'), $imageName);

        // $post->image = $imageName;
        $post->save();

        return redirect()->route('newsitem.index')->with('status', 'Newsitem added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsitem = NewsItem::findOrFail($id);
        return view('newsitems.show', compact('newsitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsitem = NewsItem::findOrFail($id);
        return view('newsitems.index', compact('newsitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $newsItem = NewsItem::findOrFail($id);

        $validated = $request->validate([
            'title'       => 'required|min:3',
            'content'     => 'required|min:5',
          ]);

        $newsItem->title = $validated['title'];
        $newsItem->content = $validated['content'];
        $newsItem->publishing_date = now();
        $newsItem->save();

        // $imageName = $post->id .'.'. $request->file->getClientOriginalExtension();
        // $request->file->move(public_path('/uploads'), $imageName);

        // $post->image = $imageName;
        // $post->save();

        return redirect()->route('newsitems.index')->with('status', 'Newsitem edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsItem  $newsItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('newsitems.index')->with('status', 'Newsitem deleted');
    }
}
