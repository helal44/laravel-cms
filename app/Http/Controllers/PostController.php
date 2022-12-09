<?php

namespace App\Http\Controllers;

use App\Http\Requests\postrequest;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=Category::find(1);
        $posts=Posts::all();
        return view('layouts.admin.posts.index',compact('posts','cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::all();
        return view('layouts.admin.posts.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postrequest $r)
    {
        //
        $file = $r->image;
        $file_name = time().'.'.$file->getClientOriginalName(); 
        $post=Posts::create(['user_id'=>32,'category_id'=>$r->category,'title'=>$r->title,'image'=>$file_name,'body'=>$r->body]);
        if($post){
            $file->move('images/post_images', $file_name);
            return redirect('admin/posts');
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
        //
          


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat=Category::all();
        $post=Posts::find($id);
        return view('layouts.admin.posts.edit' ,compact('post','cat'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postrequest $r, $id)
    {
        //
        $file=$r->image;
        $file_name=time().'.'.$file->getClientOriginalname();
        
        $oldimage=Posts::find($id)->image;
        $path=public_path().'/images/post_images/'.$oldimage;
     if(File::exists($path)){
            unlink($path);
     }
        Posts::where('id',$id)->update(['user_id'=>32,'category_id'=>$r->category,'title'=>$r->title,'image'=>$file_name,'body'=>$r->body]);

        $file->move('images/post_images', $file_name);
        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $oldimage=Posts::find($id)->image;
        $path=public_path().'/images/post_images/'.$oldimage;
     if(File::exists($path)){
            unlink($path);
     }
        $delete=Posts::find($id)->delete();
        if($delete){
            return redirect('admin/posts');
        
    }


}
   
}
