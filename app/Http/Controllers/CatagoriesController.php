<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatagoriesFormRequest;
use App\Models\Catagory;
use Exception;

class CatagoriesController extends Controller
{

    /**
     * Display a listing of the catagories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $catagories = Catagory::paginate(999999);

        return view('catagories.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new catagory.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('catagories.create');
    }

    /**
     * Store a new catagory in the storage.
     *
     * @param App\Http\Requests\CatagoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(CatagoriesFormRequest $request)
    {
        try {

            $data = $request->getData();

            Catagory::create($data);

            return redirect()->route('catagories.catagory.index')
                ->with('success_message', 'บันทึกข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Display the specified catagory.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $catagory = Catagory::findOrFail($id);

        return view('catagories.show', compact('catagory'));
    }

    /**
     * Show the form for editing the specified catagory.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $catagory = Catagory::findOrFail($id);


        return view('catagories.edit', compact('catagory'));
    }

    /**
     * Update the specified catagory in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\CatagoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, CatagoriesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $catagory = Catagory::findOrFail($id);
            $catagory->update($data);

            return redirect()->route('catagories.catagory.index')
                ->with('success_message', 'แก้ไขข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Remove the specified catagory from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $catagory = Catagory::findOrFail($id);
            $catagory->delete();

            return redirect()->route('catagories.catagory.index')
                ->with('success_message', 'ลบข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
