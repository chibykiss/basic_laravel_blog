<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;

class PostController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all posts
        $posts = Post::all();
        //get the firstname of author for each post
        // $admin_id = session('loggedUser');
        // $author = Post::where('admin_id', '=', $admin_id);
        // return $author->admin;
        //to get all the post by a spacific admin
        //$admin = Admin::find($admin_id);
        //return $admin->post;
      
        return view('admin.post', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('admin.create_post')->with('categorys', $categorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //make validation first
        $request->validate([
            "title" => "required",
            "content" => "required",
            "category" => "required",
        ]);

        //instantiate the class
        $post = new Post();
        if($request->hasFile('post_pic')){
            $subpath = "post_images";
            $fullfile = $request->file('post_pic');
            $filePath = $this->UserImageUpload($fullfile,$subpath);
        }else{
            $filePath = "noimage.jpg";
        }
        $post->admin_id = session('loggedUser');
        $post->post_pic = $filePath;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->tags = $request->tags;
        //save to db
        $saveit = $post->save();
        if($saveit){
            return redirect('admin/post')->with('success', 'post created succesdfully');
        }else{
            return back()->with('fail', 'post creation failed');
        }
        
        

    }

    /**
     * Display the specified resource.
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
        $categorys = Category::all();
        $post = Post::find($id);
        return view('admin.edit_post', ['categorys' => $categorys, 'post' => $post]);
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
        //make validation first
        $request->validate([
            "title" => "required",
            "content" => "required",
            "category" => "required",
        ]);

        //instantiate the class
        $post = Post::find($id);
        if($request->hasFile('post_pic')){
            $subpath = "post_images";
            $fullfile = $request->file('post_pic');
            $filePath = $this->UserImageUpload($fullfile,$subpath);
            $post->post_pic = $filePath;
        }

    
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->tags = $request->tags;
        //save to db
        $saveit = $post->update();
        if($saveit){
            return redirect('admin/post')->with('success', 'post updated succesdfully');
        }else{
            return back()->with('fail', 'post update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('success', 'post deleted successfully');
    }
}
