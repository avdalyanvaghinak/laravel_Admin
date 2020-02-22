<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.post.post')
            ->with('posts',$posts);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
        ]);

        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->sub_title = $request->input('sub_title');
        $posts->description = $request->input('description');

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('/images/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            $posts->avatar = $filename;

        }
        $posts->save();

        return redirect('/posts')->with('status' ,'Posts Added');
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
        $posts = Post::findOrFail($id);
        return view('admin.post.edit')
            ->with('posts',$posts);
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
        $posts = Post::findOrFail($id);
        $posts->title = $request->input('title');
        $posts->sub_title = $request->input('sub_title');
        $posts->description = $request->input('description');

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename = time() . '.' .$image->getClientOriginalExtension();
            $location = public_path('/images/'.$filename);
            Image::make($image)->resize(400,400)->save($location);
            $posts->avatar = $filename;

        }
        $posts->update();

        return redirect('/posts')->with('status','Post Apdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        $posts->delete();

        return redirect('/posts')->with('status','Post Deleted');

    }
}
