<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Userdetail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function home()
    {
        return view('Admin.home');
    }
    public function details()
    {

        return view('Admin.updateprofile');
    }
    public function updatedetails(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/', $image);
            UserDetail::create([
                'first_name' => $request->get('fname'),
                'last_name' => $request->get('lname'),
                 'gender' => $request->get('gender'),
                'address' => $request->get('address'),
                'phone' => $request->get('phone'),
                'user_id' => $request->get('userid'),
                'image' => $image,

            ]);
              $request -> session() ->flash('success-message','details added successfully');
        return redirect()->back(); 
        }
    }
     public function viewprofile($id)
        {
            
         $uid=$id;
            $admin = UserDetail::where('user_id','=' ,$uid)->get();
            
            return view('Admin.viewprofile', ['admin' => $admin]);
            
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
