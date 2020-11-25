<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use File;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function create(){
        return view('admin.post.create')->with('categories' , Category::all());
    }

    public function store(StorePostRequest $request, Post $post){

        $extension = $request->image->getClientOriginalExtension();
        $img_new_name = $request->image->getClientOriginalName();
        $filename  = date('Ymdhis') . '-' . $img_new_name . rand(100 , 100000);
        $image = File::get($request->image);
        Storage::disk('public')->put('images/posts/' . $filename . '.' . $extension , $image);
        $image_name = 'images/posts/' . $filename . "." . $extension;
        $post = Post::create([
         'title' => $request->title,
         'content' =>$request->content,   
         'image'=>$image_name,   
         'category_id' =>$request->category_id,   
        ]);
    //    dd($post);
        return redirect()->route('admin.posts.index')->with('status', 'Post Created Successfullty!');;
    }

    public function edit(Post $post){
        return view('admin.post.edit' , compact('post'))->with('categories' , Category::all());
    }

    public function update(UpdatePostRequest $request ,Post $post){
        $data = [
            'title' => request()->title,
            'content' => request()->content,
            'category_id' => request()->category_id
        ];
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('storage/'.$post->image);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            $image = request()->file('image')->store('uploads', 'public');
            $data['image'] = $image;
            $post->update($data);
        }
        $post->update($data);
                 return redirect()->route('admin.posts.index')->with('status', 'Post Updated Successfullty!');;

    }
    public function destroy(Post $post){
        $post->delete();
        return back()->with('status', 'Post Deleted Successfully!');

    }
}
