<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.index', [
            'categories' => Category::latest()->filter(request(['published', 'search']))->paginate(10)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:male,female',
            'is_publish' => 'required|boolean',
            'description' => 'required'
        ]);

        Category::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');;
    }

    public function create() {
        return view('pages.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('pages.show', [
            'category' => $category       
        ]);
    }

    public function edit(Category $category) {
        return view('pages.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:male,female',
            'is_publish' => 'required|boolean',
            'description' => 'required'
        ]);

        $category->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
