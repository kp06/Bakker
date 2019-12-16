<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddMenu()
    {
        return view('Admin.Bakery.pages.addMenu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMenu(Request $request)

    {
         Menu::create([
                'title' => $request->get('title'),
                'slug' => $request->get('slug'),
                'is_active' => $request->get('isactive'),
                     'description' => $request->get('description')
            ]);

            $request->session()->flash('success-message', 'Menu added successfully');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMenu()
    {
    $menu=Menu::orderBy('id','desc')->get();
    return view('Admin.Bakery.Pages.showmenu',['menu'=>$menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditMenu(Request $request,$slug)
    {
        $menu=Menu::where('slug',$slug)->get();
        return view('Admin.Bakery.Pages.editMenu',['menu'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateMenu(Request $request, $id)
    {
         $menu = Menu::find($id);

     
        $menu->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'is_active' => $request->get('isactive'),
                 'description' => $request->get('description')

        ]);
        $request -> session() ->flash('success-message','Menu Edited Successfully');
        return redirect()->back();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMenu(Request $request,$id)
    {  
         $this->authorize('delete');
        $menu = Menu::find($id);
     
       
       
        $menu->delete();
    
            $request->session()->flash('success-message', 'Menu deleted successfully');
            return redirect()->back(); 
    }
}
