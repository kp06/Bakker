<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\MenuItem;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMenuItem()
    {
        $menu = Menu::orderBy('id', 'desc')->get();

        return view('Admin.Bakery.Pages.addMenuItem', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMenuItem(Request $request)
    {
        MenuItem::create([
            'parent_id' => $request->get('pid'),
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'is_active' => $request->get('isactive'),

        ]);

        $request->session()->flash('success-message', 'Menu added successfully');
        return redirect()->back();
    }
public function showMenuItem()
{
    $menuitem=MenuItem::with(['menu'])->orderBy('id','asc')->get();
   
    return view('Admin.Bakery.Pages.showMenuItem',['menuitem'=>$menuitem]);
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
    public function showParentItem ($slug)
    {
        $menu=Menu::with(['menuitem'])->where('slug',$slug)->get();
       
        return view('Admin.Bakery.Pages.showParentItem',['menu'=>$menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditMenuItem(Request $request,$slug)
    {
        $menuitem=MenuItem::where('slug',$slug)->get();
        $menu=Menu::orderBy('id','asc')->get();
        return view('Admin.Bakery.Pages.editMenuItem',compact('menuitem','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateMenuItem(Request $request, $id)
    {
         $menuitem = MenuItem::findOrFail($id);

     
        $menuitem->update([
            'parent_id' => $request->get('pid'),
            'name' => $request->get('name'),
            'slug' => $request->get('slug'),
            'is_active' => $request->get('isactive'),

        ]);
        $request -> session() ->flash('success-message','Menu-Item Edited Successfully');
        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMenuItem(Request $request,$id)
    {  
         $this->authorize('delete');
        $menuitem = MenuItem::find($id);
     
       
       
        $menuitem->delete();
    
            $request->session()->flash('success-message', 'Menu-Item deleted successfully');
            return redirect()->back(); 
    }
}
