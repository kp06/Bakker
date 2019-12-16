<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Bakery;
use Illuminate\Http\Request;
use App\Model\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        $baker = Bakery::orderBy('id')->get();
        $this->authorize('category');
        return view('Admin.Bakery.Category.category', ['baker' => $baker]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function actAddCategory(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/Category', $image);
            $category = Category::create([
                'name' => $request->get('cname'),
                'slug' => $request->get('slug'),
                'is_active' => $request->get('isactive'),
                'image' => $image,
                'description' => $request->get('description')
            ]);
            $request->session()->flash('success-message', 'bakery added successfully');
            return redirect()->back();
        }
    }
    public function manageCategory()
    {
        $baker = Bakery::orderBy('id', 'asc')->get();
        $category = Category::orderBy('id', 'asc')->get();
        return view('Admin.Bakery.Category.MAnageCategory', compact('baker', 'category'));
    }
    public function actManageCategory(Request $request)
    {
        $baker = Bakery::find($request->bid);

        $request->all();
        $id = $request->get('cid');
        foreach ($id as $newid) {
            $category = Category::find($newid);
            $baker->category()->attach($category);
        }



        $request->session()->flash('success-message', 'relation added successfully');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    public function showCategory()
    {
        $category = Category::orderBy('id', 'asc')->get();
        return view('Admin.Bakery.Category.showcategory', ['category' => $category]);
    }
    public function showEditCategory($slug)
    {
        $slug = $slug;
        $category = Category::where('slug', $slug)->get();
        if ($category->isEmpty()) {
            abort(404);
        }
        return view('Admin.Bakery.Category.showeditcategory', ['category' => $category]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBakerCategory($slug)
    {
        $baker = Bakery::with(['category'])->where('slug', '=', $slug)->get();

        return view('Admin.Bakery.Category.bakercategory', ['baker' => $baker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $category = Category::findOrFail($id);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = sha1(time()) . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/Category/', $image);
            if ($category->image) {
                unlink('admin/images/Category/' . $category->image);
            }
            $category->image = $image;
        }
        $category->update([
            'name' => $request->get('cname'),
            'slug' => $request->get('slug'),
            'is_active' => $request->get('isactive'),

            'description' => $request->get('description')
        ]);
        $request->session()->flash('success-message', 'Category Edited Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Request $request, $id)
    {
        $this->authorize('delete');
        $category = Category::find($id);

        $category->delete();

        $request->session()->flash('success-message', 'Product deleted successfully');
        return redirect()->back();
    }
}
