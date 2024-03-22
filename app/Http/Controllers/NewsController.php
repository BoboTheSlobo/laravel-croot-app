<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created news item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        // Process image upload
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Create a new news item
        $news = new News();
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->image = 'images/'.$imageName;
        $news->status = $validatedData['status'] ? 1 : 0; // Convert boolean to integer
        $news->save();

        // Redirect back with a success message
        return redirect()->route('news.index')->with('success', 'News item created successfully!');
    }

    /**
     * Show the form for editing the specified news item.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        // Update the news item's attributes
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->status = $validatedData['status'] ? 1 : 0; // Convert boolean to integer

        // Process image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $news->image = 'images/'.$imageName;
        }

        // Save the updated news item
        $news->save();

        // Redirect back with a success message
        return redirect()->route('news.index')->with('success', 'News item updated successfully!');
    }

    /**
     * Remove the specified news item from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // Delete the news item
        $news->delete();

        // Redirect back with a success message
        return redirect()->route('news.index')->with('success', 'News item deleted successfully!');
    }
    public function filter(Request $request)
    {
        $status = $request->status;
        if ($status === 'all') {
            $news = News::all();
        } else {
            // Adjust the condition based on the selected status
            $news = News::where('status', $status === 'active' ? 1 : 0)->get();
        }
    
        // Return a partial view containing the filtered news items
        return view('news.filtered', compact('news'));
    }
    
    
}
