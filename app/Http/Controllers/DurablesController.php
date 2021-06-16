<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DurablesFormRequest;
use App\Models\Category;
use App\Models\Catagory;
use App\Models\Durable;
use Exception;
use Intervention\Image\Facades\Image as Image;

class DurablesController extends Controller
{

    /**
     * Display a listing of the durables.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $durables = Durable::with('category')->with('catagory')->paginate(999999);

        return view('durables.index', compact('durables'));
    }

    /**
     * Show the form for creating a new durable.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('category_name','id')->all();
        $catagories = Catagory::pluck('catagory_name','id')->all();

        return view('durables.create', compact('categories','catagories'));
    }

    /**
     * Store a new durable in the storage.
     *
     * @param App\Http\Requests\DurablesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(DurablesFormRequest $request)
    {

        $data = array(
            'du_name' => $request->du_name,
            'duID' => $request->duID,
            'category_id' => $request->category_id,
            'catagory_id' => $request->catagory_id,
            'amount' => $request->amount,
            'break' => $request->break,
            'use' => $request->use,
        );

        $image = $request->file('photo');
                // เช็คว่ามีการเลือกไฟล์ภาพเข้ามาหรือไม่
                if(!empty($image)){
                    $file_name = "product_".time().".".$image->getClientOriginalExtension();
                    if($image->getClientOriginalExtension() == "jpg" or $image->getClientOriginalExtension() == "png"){
                       
                        $imgWidth = 300;
                        $folderupload = "assets/images/durables";
                        $path = $folderupload."/".$file_name;

                        // upload to folder durables
                        $img = Image::make($image->getRealPath());

                        if($img->width() > $imgWidth){
                            $img->resize($imgWidth, null, function($constraint){
                                $constraint->aspectRatio();
                            });
                        }

                        $img->save($path);
                        $data['photo'] = $file_name;
                    }else{
                        return redirect()->route('durables.durable.index')->withInput()->withErrors(['unexpected_error' => 'ไฟล์ภาพไม่รองรับ อนุญาติเฉพาะ .jpg และ .png.']);
                    }

                }

        try {

            // $data = $request->getData();
            Durable::create($data);

            return redirect()->route('durables.durable.index')
                ->with('success_message', 'บันทึกข้อมูลเรียบร้อบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Display the specified durable.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $durable = Durable::with('category')->with('catagory')->findOrFail($id);

        return view('durables.show', compact('durable'));
    }

    /**
     * Show the form for editing the specified durable.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $durable = Durable::findOrFail($id);
        $categories = Category::pluck('category_name','id')->all();
        $catagories = Catagory::pluck('catagory_name','id')->all();

        return view('durables.edit', compact('durable','categories','catagories'));
    }

    /**
     * Update the specified durable in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\DurablesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, DurablesFormRequest $request)
    {
        try {

            $data = $request->getData();

            $durable = Durable::findOrFail($id);
            $durable->update($data);

            return redirect()->route('durables.durable.index')
                ->with('success_message', 'แก้ไขข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'มีข้อมูลที่ซ้ำกัน.']);
        }
    }

    /**
     * Remove the specified durable from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $durable = Durable::findOrFail($id);
            $durable->delete();

            return redirect()->route('durables.durable.index')
                ->with('success_message', 'ลบข้อมูลเรียบร้อยแล้ว.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



}
