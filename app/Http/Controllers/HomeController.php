<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Post $post){
        $posts = $post->orderBy('id', 'desc')->paginate(3);
        //$carousel_posts = $post->latest()->take(3)->get()->toArray();
        $carousel_posts = $post->latest()->take(3)->get();
        $first_carousel = $carousel_posts[0];
        $second_carousel = $carousel_posts[1];
        $third_carousel = $carousel_posts[2];
        //return $first_carousel;
        return view('home', ['posts' => $posts, 'carousel_one' => $first_carousel, 'carousel_two' => $second_carousel, 'carousel_three' => $third_carousel]);
        //return $first_carousel;
        //return $carousel_posts;
        // foreach($posts as $postz){
        //     $data = $postz->title;
        // }
        // return $data;
        // $object = (object) $data;
        // return $object; 
        // for
        // $carousel_post = array_slice($posts, 0, 3);
        // return $carousel_post;
    }

    public function category(){
        return view('category');
    }
    public function single_cat($category){
        $post_categorys = Post::where('category', '=', $category)->paginate(3);
        return view('category', ['post_categorys' => $post_categorys]);
    }

    public function single_post($id){
        $single_post = Post::find($id);
        $single_cat = $single_post->category;
        //return $single_cat;
        //check for related category and return it
        $related = Post::where([
            ['category','=',$single_cat],
            ['id', '<>', $id],
        ])->take(3)->get();
        //check for comments and return it
        $comments = $single_post->comment;
        // return $comments->user;
        return view('single', ['single_post' => $single_post, 'related' => $related, 'comments' => $comments]);
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        $data = [
            "address" => "1104 miami crescent, miami florida",
            "email" => "vibetek@outlook.com",
            "phone" => "+18479375938"
        ];
        $contact =  (object) $data;
        return view('contact', compact('contact'));
    }
    public function search(Request $request){
        if(isset($_GET['item'])){
            $serch_term = $_GET['item'];
            $posts = Post::select('*')
            ->where('title', 'LIKE', '%'.$serch_term.'%')
            ->orWhere('category', 'LIKE', '%'.$serch_term.'%')
            ->paginate(3);
            $posts->appends($request->all());
            return view('search', compact('posts'));
        }else{
            return redirect('/home');
        }
       
        
    }
}
