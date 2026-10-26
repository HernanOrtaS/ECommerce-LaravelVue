<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select(['id', 'name', 'description'])->paginate(5);
        return Inertia::render('Manager/Category/CategoryDashboard', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
    }

    public function update(CategoryRequest $request, int $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
