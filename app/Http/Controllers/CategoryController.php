<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('todos')->where('user_id', Auth::id())->get();
        return view('category.index', compact('categories'));
    }



    //{
    //    $categories = Category::withCount('todos')->get();
    //    return view('category.index', compact('categories'));
    //}

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        $category = Category::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        $category->update([
            'title' => $request->title ?: '(Untitled Category)',
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted.');
    }
}
