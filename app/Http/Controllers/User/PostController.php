<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::paginate(10);
        return view('user.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Post();
        $posts->user_id  = Auth::user()->id;
        $posts->title = $request->get('title');
        $posts->sub_title = $request->get('sub_title');
        $posts->description = $request->get('description');

        if ($request->hasFile('avatar')){
            $image = $request->file('avatar');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/'.$filename);
            Image::make($image)->resize(200,200)->save($location);
            $posts->avatar = $filename;
        }
        $posts->save();

        return redirect('/post')->with('status','Your post create Sucsessfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        $posts = Post::find($id);
        return view('user.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function shows()
    {
        $posts = Post::all()->where('user_id',Auth::user()->id);
        return view('user.userpost',compact('posts'));
    }

    public function edit($id)
    {


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

        return back()->with('status','Post Deleted');
    }
}
