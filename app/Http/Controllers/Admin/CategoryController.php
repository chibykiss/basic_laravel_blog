<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageUpload;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImageUpload; //Using our created Trait to access inside trait method
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('admin.category')->with('categorys', $categorys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_cat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            "category" => "required|string",
            "cat_pic" => "image|nullable"
        ]);
        

        //get logged in userid
        $admin_id = session('loggedUser'); //      return $admin_id;
        //get the category model
        $category = new Category();
        //image upload handling
        
        if($request->hasFile('cat_pic')){
            $subpath = "cat_images";
            $fullfile = $request->file('cat_pic');
            $filePath = $this->UserImageUpload($fullfile,$subpath); //Passing $data->image as parameter to our created method
        }else{
            $filePath = "noimage.jpg";
        }
        $category->cat_pic = $filePath;
        $category->admin_id = $admin_id;
        $category->category = $request->category;
        $savedcat = $category->save();
        if($savedcat){
            return redirect('admin/category')->with("success", "category added successfully");
        }else{
            return back()->with("fail", "an error occured");
        }
     


    }

    /**
     * Display the specified resource. single post
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.update_cat')->with('category', $category);
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
        //validate request
        $request->validate([
            "category" => "required|string",
            "cat_pic" => "image"
        ]);

        $category = Category::find($id);

        if($request->hasFile('cat_pic')){
            $subpath = "cat_images";
            $fullfile = $request->file('cat_pic');
            $filePath = $this->UserImageUpload($fullfile,$subpath); //Passing $data->image as parameter to our created method
            $category->cat_pic = $filePath;
        }

        //find the particular category
        
       
        $category->category = $request->category;
        $category->save();
        return redirect('admin/category')->with('success', 'category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('success', 'category deleted successfully');
    }
}
