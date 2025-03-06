<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $categories = Category::query()->orderBy('id', 'DESC')->paginate(10);

            return view('categories.index', [
                'categories' => $categories
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $category = new Category();

            return view('categories.create', [
                'category' => $category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data= $request->validated();

            Category::create($data);

            return to_route('categories.index')->with('sessionMessage', 'Categoría Creada Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {

            return view('categories.show', [
                'category' => $category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        try {

            return view('categories.edit', [
                'category' => $category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $data= $request->validated();

            $category->update($data);

            return to_route('categories.index')->with('sessionMessage', 'Categoría Actualizada Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {

            $category->delete();

            return to_route('categories.index')->with('sessionMessage', 'Categoría Eliminada Correctamente');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}