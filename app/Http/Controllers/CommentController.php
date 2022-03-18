<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
  public function add_comment(Comment $comment, Request $request){
      if(Auth::check()){
        $request->validate([
            "comment" => "required"
        ]);

        $comment->post_id = $request->postid;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $saveit = $comment->save();
        if($saveit){
            return back()->with('success', 'comment added successfully');   
        }
        //return $post_id;
      }else{
          return back()->with('fail', 'You have to be logged in first');
      }

  }
  public function show_edit($post_id,$comment_id){
  
        $single_post = Post::find($post_id);
        $single_cat = $single_post->category;
        //return $single_cat;
        //check for related category and return it
        $related = Post::where([
            ['category','=',$single_cat],
            ['id', '<>', $post_id],
        ])->take(3)->get();
        //check for comments and return it
        $comments = $single_post->comment->except($comment_id);
        $comment_to_edit = $single_post->comment->only($comment_id)->first();
        //return $comment_to_edit;
        return view('single_post_edit', ['single_post' => $single_post, 'related' => $related, 'comments' => $comments, 'comment_to_edit' => $comment_to_edit]);
    
  }
  public function update(Request $request){
      //check if gate allows the logged in user to update comment, else abort the request
      $comment_id = $request->commentid;  //gets comment id
      $user_id = auth()->user()->id;  //get the logged in user id
      $post_id = $request->postid; //gets the post id
      /*since we are updating the comments, the userid and the postid never changes so we do not need 
      to add the userid and the postid to the comment update.*/
      $comment = Comment::find($comment_id);
      if(! Gate::allows('update-comment',$comment)){
            return back()->with('fail', "you can't edit a comment that is not yours");
      }
      $request->validate([
            "comment" => "required",
      ]);
    
   
    
      $comment->comment = $request->comment;
      $update_it = $comment->update();
      if($update_it){
            return redirect("/single/$post_id")->with('success','comment updated successfully');
      }else{
        return redirect("/single/$post_id")->with('fail','comment update failed');
      }
  }
  public function delete($post_id,$comment_id){
        $comment = Comment::find($comment_id); 
        if(! Gate::allows('delete-comment',$comment)){
            return back()->with('fail', "you can't delete a comment that is not yours");
      }
      $deleteit = $comment->delete();
      if($deleteit){
        return redirect("/single/$post_id")->with('success','comment deleted successfully');
      }else{
        return redirect("/single/$post_id")->with('fail','comment could not be deleted');
      }
    
  }
}
