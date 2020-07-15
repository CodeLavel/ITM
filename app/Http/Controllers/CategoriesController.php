<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesFormRequest;
use App\Models\Category;
use Exception;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(999999);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('categories.create');
    }

    /**
     * Store a new category in the storage.
     *
     * @param App\Http\Requests\CategoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CategoriesFormRequest $request)
    {
        try {

            $data = $request->getData();

            Category::create($data);

            return redirect()->route('categories.category.index')
                ->with('success_message', 'บันทึกข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);


        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CategoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CategoriesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $category = Category::findOrFail($id);
            $category->update($data);

            return redirect()->route('categories.category.index')
                ->with('success_message', 'แก้ไขข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('categories.category.index')
                ->with('success_message', 'ลบข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
