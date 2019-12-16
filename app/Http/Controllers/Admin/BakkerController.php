<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bakery;

class bakkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newBakker()
    {
        return view('Admin.Bakery.newBakker');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addbakery(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/Bakery', $image);
            Bakery::create([
                'name' => $request->get('bname'),
                'slug' => $request->get('slug'),
                'is_active' => $request->get('isactive'),
                'image' => $image,
                'description' => $request->get('description'),
                'location' => $request->get('location'),
                'number' => $request->get('number'),

            ]);
            $request->session()->flash('success-message', 'bakery added successfully');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBakeries()
    {
        $bakery = Bakery::orderBy('id', 'desc')->get();
        return view('Admin.Bakery.showbakery', ['bakery' => $bakery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditBakery($slug)
    {


        $slug = $slug;



        $bakery = Bakery::where('slug', $slug)->get();
        if ($bakery->isEmpty()) {
            abort(404);
        }
        return view('Admin.Bakery.showEditBakery', ['bakery' => $bakery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBakery(Request $request, $id)
    {

        $bakery = Bakery::findOrFail($id);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = sha1(time()) . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/Bakery/', $image);
            if ($bakery->image) {
                if(is_file(public_path('admin/images/Bakery/' . $bakery->image))){
                unlink('admin/images/Bakery/' . $bakery->image);
                }
            }
            $bakery->image = $image;
        }
        $bakery->update([
            'name' => $request->get('bname'),
            'slug' => $request->get('slug'),
            'is_active' => $request->get('isactive'),
            
            'description' => $request->get('description'),
            'location' => $request->get('location'),
            'number' => $request->get('number'),
        ]);
        $request->session()->flash('success-message', 'Bakery Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBakery(Request $request, $id)
    {
        $this->authorize('delete');
        $bakery = Bakery::find($id);

        $bakery->delete();

        $request->session()->flash('success-message', 'Bakery deleted successfully');
        return redirect()->back();
    }
}
