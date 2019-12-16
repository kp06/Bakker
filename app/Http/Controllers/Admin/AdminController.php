<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Userdetail;
use App\User;
use Auth;
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
        $id=Auth::user()->id;
       $details=UserDetail::where('user_id',$id)->first();
       if(isSet($details))
       {
           return redirect()->back();
       }
        return view('Admin.Profile.updateprofile',['details'=>$details]);
    }
    public function temp()
    {
        return view('public');
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
                'is_staff' => $request->get('staff'),

            ]);
              $request -> session() ->flash('success-message','details added successfully');
        return redirect()->back(); 
        }
    }
     public function viewprofile($id)
        {
            
         $uid=$id;
            $admin = UserDetail::where('user_id','=' ,$uid)->get();
            
            return view('Admin.Profile.viewprofile', ['admin' => $admin]);
            
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
    public function showAdmin(){
        $admin = User::with(['userDetail','roles'])->orderBy('id','asc')->get();
        return view('Admin.Profile.showAdmin',['admin'=>$admin]);

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
    public function showedit($id)
    {
        $nid=$id;

       $user = User::with(['userDetail'])->where('id',$id)->first();
            
        return view('Admin.Profile.editprofile',['user' => $user]);

    }
    public function actEditProfile(Request $request,$id)
    {
        $addImage = UserDetail::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = sha1(time()) . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/', $image);
            if ($addImage->image) {
                unlink('admin/images/' . $addImage->image);
            }
            $addImage->image = $image;
        }
        $addImage->update([
            'first_name' => $request->get('fname'),
            'last_name' => $request->get('lname'),
             'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'user_id' => $request->get('userid'),
            
            'is_staff' => $request->get('staff'),

        ]);
        $request -> session() ->flash('success-message','Profile Edited Successfully');
        return redirect()->back();
       
       

    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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
    public function deleteAdmin(Request $request,$id)
    {
        $this->authorize('delete');
    $deleteadmin= User::find($id);
   
    $deleteadmin->delete();

        $request->session()->flash('success-message', 'Admin deleted successfully');
        return redirect()->back(); 
    }
}
