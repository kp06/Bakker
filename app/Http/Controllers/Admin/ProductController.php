<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAddProduct()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('Admin.Bakery.Product.product', ['category' => $category]);
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
    public function viewCategoryProduct($slug)
    {

        $category=Category::with(['product'])->where('slug',$slug)->get();
      
     
        return view('Admin.Bakery.Product.categoryproduct',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/product', $image);
          
        
            Product::create([
                'name' => $request->get('pname'),
                'slug' => $request->get('slug'),
                'size'=>$request->get('size'),
                'is_active' => $request->get('isactive'),
             'image'=>$image,
                'description' => $request->get('description'),
                'price'=>$request->get('price'),
                'quantity'=>$request->get('quantity'),
                'category_id'=>$request->get('cid')
            ]);
}

            $request->session()->flash('success-message', 'Product added successfully');
            return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct()
    {
        $product = Product::orderBy('id','asc')->with(['category'])->get();
      return view('Admin.Bakery.Product.viewproduct',['product'=>$product]);
    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditProduct($slug)
    {

    $slug=$slug;
        $category = Category::orderBy('id', 'desc')->get();
     
        
        $product=Product::where('slug',$slug)->get();
        if($product->isEmpty())
        {
            abort(404);
        }
     return view('Admin.Bakery.product.showeditproduct',compact('category','product'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
         $product = Product::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = sha1(time()) . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/product/', $image);
            if ($product->image) {
                unlink('admin/images/product/' . $product->image);
            }
            $product->image = $image;
        }
        $product->update([
              'name' => $request->get('pname'),
                'slug' => $request->get('slug'),
                'size'=>$request->get('size'),
                'is_active' => $request->get('isactive'),
             
                'description' => $request->get('description'),
                'price'=>$request->get('price'),
                'quantity'=>$request->get('quantity'),
                'category_id'=>$request->get('cid')

        ]);
        $request -> session() ->flash('success-message','Product Edited Successfully');
        return redirect()->back();
       
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request,$id)
    {
          $this->authorize('delete');
    $deleteproduct= Product::find($id);
   
    $deleteproduct->delete();

        $request->session()->flash('success-message', 'Product deleted successfully');
        return redirect()->back(); 
    }
}
