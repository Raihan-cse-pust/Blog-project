<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function createpost(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        'Description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        $post=new Post();
        $post->title=$request->title;
        $post->Description=$request->Description;
        $image = $request->file('image');
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('image', $imageName);
            $post->image = $imageName;
        } else {
            $post->image = null; // Handle case where no image is uploaded
        }
        // $image=$request->image;
        // $imageName=time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('image',$imageName);
        // $post->image=$imageName;
        $post->user_id=Auth::user()->id;
        $post->user_name=Auth::user()->name;
        $post->save();

        return redirect()->route('admin.addpost')->with('success', 'Post created successfully!');


    }
    public function addpost(){
        return view('admin.addpost');
    }
    public function allpost(){
        $post=Post::all();
        return view('admin.allpost', compact('post'));
    }
    public function updatepost($id){
        $post=Post::findOrfail($id);
        return view('admin.updatepost', compact('post'));

    }
    public function postupdate(Request $request,$id){
        $post=Post::findOrfail($id);
        $post->title=$request->title;
        $post->Description=$request->Description;
        $image = $request->file('image');
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('image', $imageName);
            $post->image = $imageName;
        } else {
            $post->image = null; // Handle case where no image is uploaded
        }
        // $image=$request->image;
        // $imageName=time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('image',$imageName);
        // $post->image=$imageName;
        $post->user_id=Auth::user()->id;
        $post->user_name=Auth::user()->name;
        $post->save();

        return redirect()->route('admin.allpost')->with('success', 'Post created successfully!');

    }

    public function deletepost($id){
        $post=Post::findOrfail($id);
        $post->delete();
        // return view('admin.postdeleate',compact('post'));
        return redirect()->route('admin.allpost')->with('success', 'Post deleted successfully!');
    }
    // public function postdelete(Request $request, $id){
    //     $post=Post::findOrfail($id);
    //     $post->delete();
    //     return redirect()->route('admin.allpost')->with('success', 'Post deleted successfully!');
    // }


}
