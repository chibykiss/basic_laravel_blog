<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SingleMail;

class AdminController extends Controller
{
    public function showlogin(){
        return view("admin.auth.login");
    }
    public function showregister(){
        return view("admin.auth.register");
    }
    public function saveregister(Request $request){
        //validation first
        $request->validate([
            "firstname" => "required|string",
            "lastname" => "required|string",
            "email" => "required|email|unique:admins",
            "password" => "required|confirmed|min:5"
        ]);
        //intiate the admin model and assign all request to the model fillables
        $admin = new Admin();
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        //save to db
        $save = $admin->save();
        if($save){
            //to redirect to login
            //return redirect(route('admin.login'))->with("success", "admin created successfully");
            return back()->with("success", "admin created successfully");
        }else{
            return back()->with("fail", "something went wrong, try again pls");
        }
        
        //return $request->input();
    }

    public function savelogin(Request $request){
        //validate first
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:5"
        ]);
        //return $request->input();
        //check if user email exists in db
        $user_info = Admin::where("email", "=", $request->email)->first();
        if($user_info){
            if(Hash::check($request->password, $user_info->password)){
                $request->session()->put('loggedUser', $user_info->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with("fail", "password is not correct");
            }
        }else{
            return back()->with("fail", "email does not exist in our records");
        }
    }
    public function showdashboard(){
        $totalposts = Post::all()->count();
        $totalusers = User::all()->count();
        $totalcomments = Comment::all()->count();
        $totalsubscribers = Subscriber::all()->count();
        $data = ["LoggedUserInfo" => Admin::where('id', '=', session('loggedUser'))->first(), "totalposts" => $totalposts,
        "totalusers" => $totalusers, "totalcomments" => $totalcomments, "totalsubscribers" => $totalsubscribers];
        //session()->put('loggedAdmin', $data);
        //return $data;
        return view('admin.dashboard', $data);
    }
    public function logout(){
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
            return redirect('auth/login');
        }
    }
    public function showUsers(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    public function deleteUser($user_id){
        $user = User::findOrFail($user_id);
        $delete = $user->delete();
        if($delete){
            return back()->with('success', 'user deleted successfully');
        }else{
            return back()->with('fail', 'an error occured, while deleting');
        }
    }
    public function subscription(){
        $subscribers = Subscriber::all();
        return view('admin.subscription', compact('subscribers'));
    }
    public function email_subscription(){
        return view('admin.bulkemail');
    }
    public function email_sub_single($email){
        return view('admin.singlemail',['email' => $email]);
    }
    public function sendemail(Request $request){
        $request->validate([
            "subject" =>"required",
            "content" => "required"
        ]);
        $subject = $request->subject;
        $content = $request->content;
        //return $request->email;
        $reciever = $request->email;
        Mail::to($reciever)
        ->send(new SingleMail($content,$subject));
        return back()->with('success', 'Email sent successfully');
        //use this inorder to see the email template first
         // return (new SingleMail($content,$subject))->render();
        //Mail::to($request->user())->send(new OrderShipped($order));
    }
    public function sendbulk(Request $request){
        $request->validate([
            "subject" => "required",
            "content" => "required"
        ]);
        $recievers = Subscriber::all();
        $subject = $request->subject;
        $content = $request->content;
        foreach($recievers as $reciever){
            $remail = $reciever->email;
            Mail::to($remail)->send(new SingleMail($content,$subject));
        }
        return back()->with('success', 'emails sent successfully');
    }
}
